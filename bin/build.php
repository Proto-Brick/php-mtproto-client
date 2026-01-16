<?php
declare(strict_types=1);

require_once __DIR__ . '/GeneratorTL.php';
require_once __DIR__ . '/ApiGenerator.php';

class Builder
{
    private const CLIENT_PATH = __DIR__ . '/../src/Client.php';
    private const DEFAULT_SCHEMA_DIR = __DIR__ . '/../schema';
    private const LAYER_FILE_PATH = __DIR__ . '/../src/Generated/TL_Layer.php';

    public function run(): void
    {
        // --- 1. Определение схемы ---
        $schemaInfo = $this->resolveSchema();
        $schemaPath = $schemaInfo['path'];
        $layerVersion = $schemaInfo['layer'];

        echo "Using schema: " . basename($schemaPath) . " (Layer {$layerVersion})\n";
        echo "------------------------------------------\n";

        // --- 2. Генерация TL объектов ---
        // Сначала запускаем генератор, он очистит папку src/Generated
        echo "Step 1: Running TL objects generator...\n";
        $tlGenerator = new GeneratorTL($schemaPath);
        $tlGenerator->run();

        // --- 3. Генерация константы слоя ---
        // Теперь безопасно создаем файл, папка уже чистая и существует
        echo "Generating Layer constant...\n";
        $this->generateLayerFile($layerVersion);

        $typeToConstructorsMap = $tlGenerator->typeToConstructorsMap;
        $abstractTypes = $tlGenerator->abstractTypes;
        $enumTypes = $tlGenerator->enumTypes;

        echo "------------------------------------------\n";

        // --- 4. Генерация API методов ---
        echo "Step 2: Running Fluent API generator...\n";
        $apiGenerator = new ApiGenerator($schemaPath, $typeToConstructorsMap, $abstractTypes, $enumTypes);
        $apiGenerator->run();
        $generatedApiClasses = ApiGenerator::$generatedClasses;

        echo "------------------------------------------\n";

        // --- 5. Инъекция в Client.php ---
        echo "Step 3: Injecting API properties into Client.php...\n";
        $this->injectPropertiesIntoClient($generatedApiClasses);

        echo "------------------------------------------\n";
        echo "Build process completed successfully! Layer: {$layerVersion}\n";
    }

    /**
     * Определяет, какой файл использовать.
     * @return array{path: string, layer: int}
     */
    /**
     * Определяет, какой файл использовать.
     * @return array{path: string, layer: int}
     */
    private function resolveSchema(): array
    {
        global $argv, $argc;

        // Вариант А: Путь передан явно через аргумент
        if ($argc > 1 && !empty($argv[1])) {
            $argPath = $argv[1];
            $tryPaths = [
                $argPath,
                self::DEFAULT_SCHEMA_DIR . DIRECTORY_SEPARATOR . $argPath
            ];

            foreach ($tryPaths as $p) {
                if (file_exists($p)) {
                    $filename = basename($p);
                    if (preg_match('/(?:v|layer)(\d+)/i', $filename, $matches)) {
                        return [
                            'path' => realpath($p),
                            'layer' => (int)$matches[1]
                        ];
                    }
                    throw new RuntimeException("Selected file '$filename' exists, but Layer version (e.g. 'v220') could not be parsed from its name.");
                }
            }
            throw new RuntimeException("Schema file not found: {$argPath}");
        }

        // Вариант Б: Авто-поиск (Smart Scan)
        $files = glob(self::DEFAULT_SCHEMA_DIR . '/*.json');
        if (empty($files)) {
            throw new RuntimeException("No .json schema files found in " . self::DEFAULT_SCHEMA_DIR);
        }

        // Сортируем естественно (v211 перед v220)
        natsort($files);

        // Переворачиваем массив, чтобы идти от новых к старым
        $files = array_reverse($files);

        foreach ($files as $filePath) {
            $filename = basename($filePath);

            // Ищем паттерн vXXX или layerXXX
            if (preg_match('/(?:v|layer)(\d+)/i', $filename, $matches)) {
                return [
                    'path' => $filePath,
                    'layer' => (int)$matches[1]
                ];
            }
            // Если паттерн не найден (например, mtproto_api.json), просто пропускаем файл
        }

        throw new RuntimeException("Could not detect any valid schema file with a version number (e.g. TL_v220.json) in " . self::DEFAULT_SCHEMA_DIR);
    }

    private function generateLayerFile(int $layer): void
    {
        $content = <<<PHP
<?php
declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated;

/**
 * Auto-generated layer version constant.
 */
interface TL_Layer
{
    public const VERSION = {$layer};
}
PHP;
        $dir = dirname(self::LAYER_FILE_PATH);
        if (!is_dir($dir)) mkdir($dir, 0777, true);
        file_put_contents(self::LAYER_FILE_PATH, $content);
    }

    // ... (injectPropertiesIntoClient оставляем старый) ...
    private function injectPropertiesIntoClient(array $generatedClasses): void
    {
        $clientContent = file_get_contents(self::CLIENT_PATH);
        if (!$clientContent) throw new RuntimeException("Could not read Client.php");

        $useStatements = [];
        foreach ($generatedClasses as $info) {
            $useStatements[] = "use {$info['fqcn']};";
        }
        sort($useStatements);
        $useBlock = implode("\n", $useStatements);

        $propertiesDocs = [];
        foreach ($generatedClasses as $groupName => $info) {
            $propertiesDocs[] = " * @property-read {$info['className']} \${$groupName}";
        }
        $propertiesDocBlock = implode("\n", $propertiesDocs);

        $properties = [];
        foreach ($generatedClasses as $groupName => $info) {
            $properties[] = "    public readonly {$info['className']} \${$groupName};";
        }
        $propertiesBlock = implode("\n", $properties);

        $constructorInits = [];
        foreach ($generatedClasses as $groupName => $info) {
            $constructorInits[] = "        \$this->{$groupName} = new {$info['className']}(\$this);";
        }
        $constructorInitsBlock = implode("\n", $constructorInits);

        $clientContent = preg_replace(
            '/(#\s*--\s*API_HANDLERS_USE_START\s*--\s*#)(.*)(#\s*--\s*API_HANDLERS_USE_END\s*--\s*#)/s',
            "$1\n" . $useBlock . "\n// #-- API_HANDLERS_USE_END --#",
            $clientContent
        );
        $clientContent = preg_replace(
            '/(#\s*--\s*API_HANDLERS_DOCBLOCK_START\s*--\s*#)(.*)(#\s*--\s*API_HANDLERS_DOCBLOCK_END\s*--\s*#)/s',
            "$1\n" . $propertiesDocBlock . "\n * $3",
            $clientContent
        );
        $clientContent = preg_replace(
            '/(#\s*--\s*API_HANDLERS_PROPERTIES_START\s*--\s*#)(.*)(#\s*--\s*API_HANDLERS_PROPERTIES_END\s*--\s*#)/s',
            "$1\n" . $propertiesBlock . "\n\n    $3",
            $clientContent
        );
        $clientContent = preg_replace(
            '/(#\s*--\s*API_HANDLERS_INIT_START\s*--\s*#)(.*)(#\s*--\s*API_HANDLERS_INIT_END\s*--\s*#)/s',
            "$1\n" . $constructorInitsBlock . "\n        $3",
            $clientContent
        );
        file_put_contents(self::CLIENT_PATH, $clientContent);
        echo "Client.php updated with " . count($generatedClasses) . " API handlers and PHPDoc properties.\n";
    }
}

try {
    (new Builder())->run();
} catch (\Throwable $e) {
    echo "\n\nBuild failed with error: " . $e->getMessage() . "\n";
}