<?php

declare(strict_types=1);

require_once __DIR__ . '/GeneratorTL.php';
require_once __DIR__ . '/ApiGenerator.php';

class Builder
{
    private const CLIENT_PATH = __DIR__ . '/../src/Client.php';

    public function run(): void
    {
        echo "Step 1: Running TL objects generator...\n";
        $tlGenerator = new GeneratorTL();
        $tlGenerator->run();

        // Получаем нужные данные после анализа схемы
        $typeToConstructorsMap = $tlGenerator->typeToConstructorsMap;
        $abstractTypes = $tlGenerator->abstractTypes;
        $enumTypes = $tlGenerator->enumTypes;
        echo "------------------------------------------\n";

        echo "Step 2: Running Fluent API generator...\n";
        // Передаем обе карты в конструктор
        $apiGenerator = new ApiGenerator($typeToConstructorsMap, $abstractTypes, $enumTypes);
        $apiGenerator->run();
        $generatedApiClasses = ApiGenerator::$generatedClasses;
        echo "------------------------------------------\n";

        echo "Step 3: Injecting API properties into Client.php...\n";
        $this->injectPropertiesIntoClient($generatedApiClasses);
        echo "------------------------------------------\n";

        echo "Build process completed successfully!\n";
    }

    private function injectPropertiesIntoClient(array $generatedClasses): void
    {
        $clientContent = file_get_contents(self::CLIENT_PATH);
        if (!$clientContent) {
            throw new RuntimeException("Could not read Client.php");
        }

        // --- 1. Подготовка use-стейтментов ---
        $useStatements = [];
        foreach ($generatedClasses as $info) {
            $useStatements[] = "use {$info['fqcn']};";
        }
        sort($useStatements);
        $useBlock = implode("\n", $useStatements);

        // --- 2. Подготовка PHPDoc @property-read аннотаций ---
        $propertiesDocs = [];
        foreach ($generatedClasses as $groupName => $info) {
            $propertiesDocs[] = " * @property-read {$info['className']} \${$groupName}";
        }
        $propertiesDocBlock = implode("\n", $propertiesDocs);

        // --- 3. Подготовка public readonly свойств ---
        $properties = [];
        foreach ($generatedClasses as $groupName => $info) {
            $properties[] = "    public readonly {$info['className']} \${$groupName};";
        }
        $propertiesBlock = implode("\n", $properties);

        // --- 4. Подготовка инициализации в конструкторе ---
        $constructorInits = [];
        foreach ($generatedClasses as $groupName => $info) {
            $constructorInits[] = "        \$this->{$groupName} = new {$info['className']}(\$this);";
        }
        $constructorInitsBlock = implode("\n", $constructorInits);

        // --- 5. Замена плейсхолдеров в шаблоне Client.php ---

        // Замена use
        $clientContent = preg_replace(
            '/(#\s*--\s*API_HANDLERS_USE_START\s*--\s*#)(.*)(#\s*--\s*API_HANDLERS_USE_END\s*--\s*#)/s',
            "$1\n" . $useBlock . "\n// #-- API_HANDLERS_USE_END --#",
            $clientContent
        );

        // Замена PHPDoc свойств
        $clientContent = preg_replace(
            '/(#\s*--\s*API_HANDLERS_DOCBLOCK_START\s*--\s*#)(.*)(#\s*--\s*API_HANDLERS_DOCBLOCK_END\s*--\s*#)/s',
            "$1\n" . $propertiesDocBlock . "\n * $3",
            $clientContent
        );

        // Замена свойств класса
        $clientContent = preg_replace(
            '/(#\s*--\s*API_HANDLERS_PROPERTIES_START\s*--\s*#)(.*)(#\s*--\s*API_HANDLERS_PROPERTIES_END\s*--\s*#)/s',
            "$1\n" . $propertiesBlock . "\n\n    $3",
            $clientContent
        );

        // Замена инициализации в конструкторе
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
    echo $e->getTraceAsString() . "\n";
}