<?php

declare(strict_types=1);

require_once __DIR__ . '/GeneratorHelpers.php';

/**
 * MTProto API Class Generator for PHP 8.1+
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
    private const API_SCHEMA_PATH = __DIR__ . '/../schema/mtproto_api.json';
    private const OUTPUT_DIR = __DIR__ . '/../src/Generated';
    private const BASE_NAMESPACE = 'DigitalStars\\MtprotoClient\\Generated';
    private const GENERATED_METHODS_NAMESPACE = self::BASE_NAMESPACE . '\\Methods';
    private const TL_OBJECT_FQN = 'DigitalStars\\MtprotoClient\\TL\\TlObject';

    private array $schema;
    public array $abstractTypes = [];
    public array $typeToConstructorsMap = [];

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
        $this->generateAbstractClasses();
        $this->generateConcreteClasses('constructors', 'Types');
        $this->generateConcreteClasses('methods', 'Methods');
        echo "Generation complete! Files are in '" . realpath(self::OUTPUT_DIR) . "' directory.\n";
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
        echo "Analyzed schema: Found " . count($this->abstractTypes) . " abstract types.\n";
        echo "Found " . count($this->concreteTypeToConstructorMap) . " concrete types with mismatched constructor names.\n";
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
        $predicate_key = $isMethod ? 'method' : 'predicate';
        $predicate = $item[$predicate_key];
        $parentType = $item['type'];
        $useStatements = [];
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
        $baseClass = basename(str_replace('\\', '/', self::TL_OBJECT_FQN));
        $extends = $baseClass;
        $parentFqcn = null;
        $parentShortName = null;
        $isConcreteOfAbstract = !$isMethod && isset($this->abstractTypes[$parentType]);
        if ($isConcreteOfAbstract) {
            $parentFqcn = $this->resolveCustomType($parentType);
            $parentShortName = basename(str_replace('\\', '/', $parentFqcn));
            $useStatements[$parentFqcn] = true;
            $extends = basename(str_replace('\\', '/', $parentFqcn));
        }

        // --- Constructor, Properties and other Use statements ---
        $constructorData = $this->buildConstructorParams($item['params'], $className, $parentFqcn);
        $constructorParamsStr = $constructorData['paramsString'];
        $propertyDocs = $constructorData['propertyDocs'];
        $paramDocs = $constructorData['paramDocs']; // <--- Получаем массив @param тегов
        $useStatements = array_merge($useStatements, $constructorData['useStatements']);

        // --- Method-specific content ---
        $methodSpecifics = '';
        if ($isMethod) {
            $methodData = $this->buildMethodSpecificContent($item);
            $methodSpecifics = $methodData['content'];
            $useStatements = array_merge($useStatements, $methodData['useStatements']);
        }

        // --- Serializer/Deserializer content ---
        $serializerData = $this->buildSerializerMethods($item, $isMethod, $isConcreteOfAbstract, $constructorData['sortedPropertyNames'], $className, $parentFqcn);
        $serializerContent = $serializerData['content'];
        $useStatements = array_merge($useStatements, $serializerData['useStatements']);

        $useStatements[self::TL_OBJECT_FQN] = true;
        if (!empty(trim($serializerContent))) {
            $useStatements['DigitalStars\\MtprotoClient\\TL\\Serializer'] = true;
            $useStatements['DigitalStars\\MtprotoClient\\TL\\Deserializer'] = true;
        }

        $useBlock = $this->buildUseBlock($useStatements, $fullNamespace, $parentFqcn);
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
        
        public string \$_ = '{$predicate}';
        {$methodSpecifics}{$constructorDocBlock}
        public function __construct({$constructorParamsStr}) {}
        {$serializerContent}
    }
    PHP;
    }
}