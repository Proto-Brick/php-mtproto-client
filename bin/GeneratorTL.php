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

    private const API_SCHEMA_PATH = __DIR__ . '/../schema/mtproto_api.json';
    private const OUTPUT_DIR = __DIR__ . '/../src/Generated';
    private const BASE_NAMESPACE = 'DigitalStars\\MtprotoClient\\Generated';
    private const TL_OBJECT_FQN = 'DigitalStars\\MtprotoClient\\TL\\TlObject';

    private array $schema;
    private array $abstractTypes = [];
    private array $typeToConstructorsMap = [];

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
        $knownConstructors = [];
        $typeUsage = [];
        foreach ($this->schema['constructors'] as $constructor) {
            $knownConstructors[$constructor['predicate']] = true;
            $typeUsage[$constructor['type']][] = $constructor['predicate'];
            $this->typeToConstructorsMap[$constructor['type']][] = $constructor;
        }

        foreach ($typeUsage as $type => $predicates) {
            if (!isset($knownConstructors[$type])) {
                $this->abstractTypes[$type] = true;
            }
        }
        echo "Analyzed schema: Found " . count($this->abstractTypes) . " abstract types.\n";
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
        $excluded = $isMethod ? $this->getExcludedMethods() : [];

        if (!$isMethod) {
            // Исключаем псевдо-конструкторы, для которых не нужно генерировать классы
            $excluded[] = 'vector';
            $excluded[] = 'true';
            $excluded[] = 'null';
            $excluded[] = 'false';
            $excluded[] = 'error';
            $excluded[] = 'boolFalse';
            $excluded[] = 'boolTrue';

        }

        foreach ($this->schema[$schemaKey] as $item) {
            $predicate_key = $isMethod ? 'method' : 'predicate';
            if (!isset($item[$predicate_key])) {
                continue;
            }

            $predicate = $item[$predicate_key];
            if (in_array($predicate, $excluded, true)) {
                continue;
            }

            [$namespace, $className] = $this->getNamespaceAndClassName($predicate);
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
        $constructorId = $item['id'] ?? 'null';
        if ($constructorId !== 'null') {
            // Преобразуем строковое представление ID в integer
            $id_int = intval($constructorId);

            // Если ID отрицательный, конвертируем его в беззнаковый 32-битный эквивалент
            if ($id_int < 0) {
                $id_unsigned = unpack('V', pack('l', $id_int))[1];
                $constructorId = $id_unsigned;
            }
        }

        // --- Extends logic ---
        $baseClass = basename(str_replace('\\', '/', self::TL_OBJECT_FQN));
        $extends = $baseClass;
        $parentFqcn = null;
        $isConcreteOfAbstract = !$isMethod && isset($this->abstractTypes[$parentType]);
        if ($isConcreteOfAbstract) {
            $parentFqcn = $this->resolveCustomType($parentType);
            $useStatements[$parentFqcn] = true;
            $extends = basename(str_replace('\\', '/', $parentFqcn));
        }

        // --- Constructor, Properties and other Use statements ---
        $constructorData = $this->buildConstructorParams($item['params']);
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
        $serializerData = $this->buildSerializerMethods($item, $isMethod, $isConcreteOfAbstract, $constructorData['sortedPropertyNames']);
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


// --- RUN THE GENERATOR ---
try {
    (new GeneratorTL())->run();
} catch (\Throwable $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}
