<?php

declare(strict_types=1);

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\TlObject;

require_once __DIR__ . '/GeneratorHelpers.php';

/**
 * MTProto API Class Generator for PHP 8.2+
 * Generates strictly-typed DTOs and Request classes with serialization methods.
 */
class GeneratorTL
{
    use GeneratorHelpers;

    /**
     * @var array<string, int> A map of [predicate => constructor_id].
     * This is a list of hardcoded exceptions for constructors where the CRC32 hash
     * calculated from the TL schema definition does not match the constructor ID
     * actually used in the MTProto protocol.
     * This list is based on the official Telegram Desktop client's generator.
     * @see https://github.com/telegramdesktop/tdesktop/blob/dev/Telegram/SourceFiles/codegen/scheme/codegen_scheme.py
     */
    private const TYPE_ID_EXCEPTIONS = [ //
        // predicate => hardcoded_decimal_id
//        'channel' => 0xc88974ac, // в 195 схеме все еще норм, но потом совпадает с channelForbidden похоже
        'ipPortSecret' => 0x37982646,
        'accessPointRule' => 0x4679b65f,
        'help.configSimple' => 0x5a592a6c,
//        'messageReplies' => 0x81834865,
    ];
    private const API_SCHEMA_PATH = __DIR__ . '/../schema/TL_telegram_v211.json';
    private const OUTPUT_DIR = __DIR__ . '/../src/Generated';
    private const BASE_NAMESPACE = 'ProtoBrick\\MTProtoClient\\Generated';
    private const GENERATED_METHODS_NAMESPACE = self::BASE_NAMESPACE . '\\Methods';
    private const TL_OBJECT_FQN = TlObject::class;
    private const RPC_REQUEST_FQN = RpcRequest::class;

    private array $schema;
    public array $abstractTypes = [];
    public array $typeToConstructorsMap = [];

    public array $enumTypes = [];

    private array $concreteTypeToConstructorMap = [];

    public function __construct()
    {
        if (!file_exists(self::API_SCHEMA_PATH)) {
            throw new RuntimeException("Schema file not found: " . self::API_SCHEMA_PATH);
        }
        $this->schema = json_decode(file_get_contents(self::API_SCHEMA_PATH), true);
        if (!$this->schema) {
            throw new RuntimeException("Failed to parse JSON schema.");
        }
    }

    public function run(): void
    {
        echo "Starting generation...\n";
        $this->cleanup();
        $this->analyzeSchema();
        $this->generateEnums();
        $this->generateAbstractClasses();
        $this->generateConcreteClasses('constructors', 'Types');
        $this->generateConcreteClasses('methods', 'Methods');
        $this->generatePeerPropertyMap();
        echo "Generation complete! Files are in '" . realpath(self::OUTPUT_DIR) . "' directory.\n";
    }

    private function generatePeerPropertyMap(): void
    {
        echo "Generating PeerPropertyMap...\n";

        $map = [];

        foreach ($this->schema['constructors'] as $constructor) {
            $predicate = $constructor['predicate'];

            if (isset($this->concreteTypeToConstructorMap[$constructor['type']]) && $this->concreteTypeToConstructorMap[$constructor['type']] === $predicate) {
                // Случай, когда тип == конструктор (единственная реализация)
                [$namespace, $className] = $this->getNamespaceAndClassName($constructor['type']);
            } else {
                [$namespace, $className] = $this->getNamespaceAndClassName($predicate);
            }

            $fullNamespace = self::BASE_NAMESPACE . '\\Types' . ($namespace ? '\\' . $namespace : '');
            $fqcn = $fullNamespace . '\\' . $className;

            $propertiesToScan = [];

            foreach ($constructor['params'] as $param) {
                $type = $param['type'];

                // Пропускаем флаги (#)
                if ($type === '#') continue;

                // Очищаем тип от '?' (flags.0?User)
                if (str_contains($type, '?')) {
                    $parts = explode('?', $type);
                    $type = end($parts);
                }

                // Логика определения: нужно ли сканировать это поле?
                // Нам нужно сканировать поле, если это НЕ примитив.
                // Примитивы в схеме TL: int, long, int128, int256, double, string, bytes, Bool, true

                $isPrimitive = in_array(strtolower($type), [
                    'int', 'long', 'int128', 'int256', 'double', 'string', 'bytes', 'bool', 'true', 'null'
                ], true);

                // Если это Vector<Primitive>, тоже пропускаем
                if (!$isPrimitive && str_starts_with($type, 'Vector<')) {
                    $inner = substr($type, 7, -1); // "Vector<int>" -> "int"
                    if (in_array(strtolower($inner), ['int', 'long', 'string', 'bytes', 'double', 'bool'], true)) {
                        $isPrimitive = true;
                    }
                }

                // Если это НЕ примитив, значит там может лежать объект (User, Chat, Message и т.д.),
                // который нужно проверить рекурсивно.
                if (!$isPrimitive) {
                    $propertiesToScan[] = $this->sanitizeParamName($param['name']);
                }
            }

            // Если у класса есть сложные свойства, добавляем в карту.
            // Ключ карты — полное имя класса (без начального слэша, как возвращает get_class)
            if (!empty($propertiesToScan)) {
                // Убираем ведущий слеш для соответствия get_class()
                $cleanFqcn = ltrim($fqcn, '\\');
                $map[$cleanFqcn] = $propertiesToScan;
            }
        }

        // --- Генерация файла с использованием короткого синтаксиса массива [] ---
        $lines = [];
        $lines[] = '<?php';
        $lines[] = '';
        $lines[] = 'return [';

        foreach ($map as $className => $properties) {
            // Экранируем кавычки в имени класса (на всякий случай)
            $safeClass = str_replace("'", "\\'", $className);

            // Формируем список свойств в формате ['prop1', 'prop2']
            $safeProps = array_map(fn($p) => "'" . str_replace("'", "\\'", $p) . "'", $properties);
            $propsList = '[' . implode(', ', $safeProps) . ']';

            // Добавляем строку в массив
            $lines[] = "    '$safeClass' => $propsList,";
        }

        $lines[] = '];';

        $content = implode("\n", $lines) . "\n";

        $outputPath = self::OUTPUT_DIR . '/PeerPropertyMap.php';
        file_put_contents($outputPath, $content);
    }

    private function cleanup(): void
    {
        if (!is_dir(self::OUTPUT_DIR)) {
            mkdir(self::OUTPUT_DIR, 0777, true);
            return;
        }
        $it = new RecursiveDirectoryIterator(self::OUTPUT_DIR, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            $file->isDir() ? rmdir($file->getRealPath()) : unlink($file->getRealPath());
        }
    }

    private function analyzeSchema(): void
    {
        // Шаг 1: Группируем конструкторы по возвращаемому типу
        $this->typeToConstructorsMap = [];
        foreach ($this->schema['constructors'] as $constructor) {
            $this->typeToConstructorsMap[$constructor['type']][] = $constructor;
        }

        // Шаг 2: Определяем абстрактные и конкретные типы
        $this->abstractTypes = [];
        $this->concreteTypeToConstructorMap = []; // Очищаем на всякий случай
        foreach ($this->typeToConstructorsMap as $type => $constructors) {
            if (count($constructors) > 1) {
                $this->abstractTypes[$type] = true;
            } else {
                // Если у типа только один конструктор, и имя типа не совпадает с именем конструктора
                $constructorPredicate = $constructors[0]['predicate'];
                if ($type !== $constructorPredicate) {
                    $this->concreteTypeToConstructorMap[$type] = $constructorPredicate;
                }
            }
        }

        $this->enumTypes = [];
        foreach (array_keys($this->abstractTypes) as $abstractType) {
            if ($this->isBuiltInType($abstractType)) {
                continue;
            }

            $isEnumCandidate = true;
            foreach ($this->typeToConstructorsMap[$abstractType] as $constructor) {
                // Если у конструктора есть хоть один параметр, это не enum.
                if (!empty($constructor['params'])) {
                    $isEnumCandidate = false;
                    break;
                }
            }

            if ($isEnumCandidate) {
                $this->enumTypes[$abstractType] = true;
                // удаляем его из списка абстрактных типов,
                // чтобы для него не генерировался Abstract-класс.
                unset($this->abstractTypes[$abstractType]);
            }
        }

        echo "Analyzed schema: Found " . count($this->abstractTypes) . " abstract types.\n";
        echo "Found " . count($this->enumTypes) . " enum types.\n";
        echo "Found " . count($this->concreteTypeToConstructorMap) . " concrete types with mismatched constructor names.\n";
    }

    private function generateEnums(): void
    {
        echo "Generating enum classes...\n";
        foreach (array_keys($this->enumTypes) as $enumType) {
            [$namespace, $className] = $this->getNamespaceAndClassName($enumType);
            $fullNamespace = self::GENERATED_TYPES_NAMESPACE . ($namespace ? '\\' . $namespace : '');
            $filePath = self::OUTPUT_DIR . '/Types/' . ($namespace ? $namespace . '/' : '') . $className . '.php';

            $cases = [];
            $matchArmsForPredicate = [];

            $typePrefix = strtolower(explode('.', $enumType)[1] ?? ''); // 'filetype' -> 'file'
            if ($typePrefix === $className) { // для storage.fileType
                $typePrefix = 'file';
            }

            foreach ($this->typeToConstructorsMap[$enumType] as $constructor) {
                $parts = explode('.', $constructor['predicate']);
                $shortPredicate = end($parts); // 'storage.fileJpeg' -> 'fileJpeg'
                // Преобразуем в CamelCase
                $caseName = $this->snakeToCamel($shortPredicate); // 'fileJpeg' -> 'FileJpeg'

                $id = (int)$constructor['id'];
                $unsigned32BitId = unpack('V', pack('l', $id))[1];
                $hexValue = '0x' . dechex($unsigned32BitId);
                $cases[] = "    case {$caseName} = {$hexValue};";
                $matchArmsForPredicate[] = "            self::{$caseName} => '{$constructor['predicate']}',";
            }
            $casesStr = implode("\n", $cases);
            $matchArmsStr = implode("\n", $matchArmsForPredicate);

            // Используем TlObjectInterface
            $content = <<<PHP
        <?php declare(strict_types=1);

        namespace {$fullNamespace};

        use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
        use ProtoBrick\MTProtoClient\TL\Deserializer;
        use ProtoBrick\MTProtoClient\TL\Serializer;
        use RuntimeException;
        use ValueError;

        /**
         * @see https://core.telegram.org/type/{$enumType}
         */
        enum {$className}: int implements TlObjectInterface
        {
        {$casesStr}

            public function serialize(): string
            {
                return Serializer::int32(\$this->value);
            }

            public static function deserialize(string &\$stream): static
            {
                \$constructorId = Deserializer::int32(\$stream);
                try {
                    return self::from(\$constructorId);
                } catch (ValueError \$e) {
                    throw new RuntimeException(sprintf(
                        'Unknown constructor ID for enum %s. Received ID: 0x%s (signed: %d)',
                        self::class,
                        dechex(unpack('V', pack('l', \$constructorId))[1]),
                        \$constructorId
                    ), 0, \$e);
                }
            }
            
            public function getConstructorId(): int
            {
                return \$this->value;
            }
            
            public function getPredicate(): string
            {
                return match(\$this) {
        {$matchArmsStr}
                };
            }
        }
        PHP;
            $this->writeFile($filePath, $content);
        }
    }

    private function generateAbstractClasses(): void
    {
        echo "Generating abstract base classes...\n";
        foreach (array_keys($this->abstractTypes) as $abstractType) {
            if ($this->isBuiltInType($abstractType)) {
                continue;
            }

            [$namespace, $className] = $this->getNamespaceAndClassName($abstractType);
            $abstractClassName = 'Abstract' . $className;
            $filePath = self::OUTPUT_DIR . '/Types/' . ($namespace ? $namespace . '/' : '') . $abstractClassName . '.php';

            // Генерируем всё содержимое файла внутри хелпера
            $content = $this->buildAbstractDeserializerBody($abstractType);

            $this->writeFile($filePath, $content);
        }
    }

    private function generateConcreteClasses(string $schemaKey, string $outputSubDir): void
    {
        echo "Generating {$outputSubDir} classes...\n";
        $isMethod = ($schemaKey === 'methods');
        $excluded = $isMethod ? $this->getExcludedMethods() : $this->getExcludedConstructors();

        $constructorToConcreteTypeMap = array_flip($this->concreteTypeToConstructorMap);

        foreach ($this->schema[$schemaKey] as $item) {
            $predicate_key = $isMethod ? 'method' : 'predicate';
            if (!isset($item[$predicate_key])) {
                continue;
            }

            $predicate = $item[$predicate_key];

            // Если конструктор принадлежит типу, который мы определили как enum, пропускаем его.
            // Сам enum уже сгенерирован в generateEnums().
            if (!$isMethod && isset($this->enumTypes[$item['type']])) {
                continue;
            }

            if (in_array($predicate, $excluded, true)) {
                continue;
            }

            if (!$isMethod && isset($constructorToConcreteTypeMap[$predicate])) {
                // Этот конструктор - единственная реализация типа с другим именем.
                // Мы должны использовать имя ТИПА для класса.
                $typeNameToUse = $constructorToConcreteTypeMap[$predicate];
                [$namespace, $className] = $this->getNamespaceAndClassName($typeNameToUse);
            } else {
                // Старая логика: имя класса берется из предиката/метода
                [$namespace, $className] = $this->getNamespaceAndClassName($predicate);
            }

            if ($isMethod) {
                $className .= 'Request';
            }

            $fullNamespace = self::BASE_NAMESPACE . '\\' . $outputSubDir . ($namespace ? '\\' . $namespace : '');
            $filePath = self::OUTPUT_DIR . '/' . $outputSubDir . '/' . ($namespace ? $namespace . '/' : '') . $className . '.php';

            $content = $this->buildClassContent($item, $isMethod, $fullNamespace, $className);
            $this->writeFile($filePath, $content);
        }
    }

    private function buildClassContent(array $item, bool $isMethod, string $fullNamespace, string $className): string
    {
        $this->resetUseTracking();
        $predicate_key = $isMethod ? 'method' : 'predicate';
        $predicate = $item[$predicate_key];
        $parentType = $item['type'];
        $constructorId = 'null';

// --- ШАГ 1: Получаем "сырой" ID в виде числа (int) ---
        $rawIdInt = null;

        if (isset(self::TYPE_ID_EXCEPTIONS[$predicate])) {
            $rawIdInt = self::TYPE_ID_EXCEPTIONS[$predicate];
        } elseif (isset($item['id'])) {
            $rawIdInt = (int) $item['id'];
        }

        if ($rawIdInt !== null) {
            $unsigned32BitId = unpack('V', pack('l', $rawIdInt))[1];
            $hexValue = dechex($unsigned32BitId);
            $constructorId = '0x' . $hexValue;
        }

        // --- Extends logic ---
        $extends = '';
        $parentFqcn = null;
        $isConcreteOfAbstract = false;

        if ($isMethod) {
            $baseClassFqn = self::RPC_REQUEST_FQN;
            $parentFqcn = $baseClassFqn; // Устанавливаем для корректной работы registerUse
            $extends = $this->registerUse($baseClassFqn, $className, null);
        } else {
            $isConcreteOfAbstract = isset($this->abstractTypes[$parentType]);
            if ($isConcreteOfAbstract) {
                // Если класс наследуется от нашего абстрактного класса,
                // то TlObject уже будет доступен через него.
                $parentFqcn = $this->resolveCustomType($parentType);
                $extends = $this->registerUse($parentFqcn, $className, null);
            } else {
                // Только если это "корневой" DTO, он наследуется напрямую от TlObject.
                $baseClassFqn = self::TL_OBJECT_FQN;
                $extends = $this->registerUse($baseClassFqn, $className, null);
            }
        }

        $this->registerUse(Serializer::class, $className, $parentFqcn);
        if (!$isMethod) {
            $this->registerUse(Deserializer::class, $className, $parentFqcn);
            if (!$isConcreteOfAbstract) {
                // Только "корневые" DTO выбрасывают это исключение при проверке constructorId
                $this->registerUse(\RuntimeException::class, $className, $parentFqcn);
            }
        }

        // --- Constructor, Properties and other Use statements ---
        $constructorData = $this->buildConstructorParams($item['params'], $className, $parentFqcn);
        $constructorParamsStr = $constructorData['paramsString'];
        $paramDocs = $constructorData['paramDocs'];

        // --- Method-specific content ---
        $methodSpecifics = '';
        if ($isMethod) {
            $methodSpecifics = $this->buildMethodSpecificContent($item, $className, $parentFqcn);
        }

        // --- Serializer/Deserializer content ---
        $serializerContent = $this->buildSerializerMethods($item, $isMethod, $isConcreteOfAbstract, $constructorData['sortedPropertyNames'], $className, $parentFqcn);

        $useBlock = $this->buildUseBlockFromAliasMap($fullNamespace, $parentFqcn);
        $seeUrl = "https://core.telegram.org/" . ($isMethod ? "method" : "type") . "/{$predicate}";
        $classDocBlock = "/**\n * @see {$seeUrl}\n */";

        // --- НАЧАЛО НОВОЙ ЛОГИКИ ---
        // Собираем PHPDoc для конструктора, если есть что собирать
        $constructorDocBlock = '';
        if (!empty($paramDocs)) {
            $constructorDocBlock = "\n    /**\n" . implode("\n", $paramDocs) . "\n     */";
        }
        // --- КОНЕЦ НОВОЙ ЛОГИКИ ---

        return <<<PHP
    <?php declare(strict_types=1);
    namespace {$fullNamespace};
    {$useBlock}{$classDocBlock}
    final class {$className} extends {$extends}
    {
        public const CONSTRUCTOR_ID = {$constructorId};
        
        public string \$predicate = '{$predicate}';
        {$methodSpecifics}{$constructorDocBlock}
        public function __construct({$constructorParamsStr}) {}
        {$serializerContent}
    }
    PHP;
    }
}