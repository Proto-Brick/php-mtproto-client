<?php

declare(strict_types=1);

use ProtoBrick\MTProtoClient\Client;

require_once __DIR__ . '/GeneratorHelpers.php';

class ApiGenerator
{
    use GeneratorHelpers;

    private const API_SCHEMA_PATH = __DIR__ . '/../schema/TL_telegram_v211.json';
    private const OUTPUT_DIR = __DIR__ . '/../src/Generated/Api';
    private const BASE_NAMESPACE = 'ProtoBrick\\MTProtoClient\\Generated\\Api';
    private const GENERATED_METHODS_NAMESPACE = 'ProtoBrick\\MTProtoClient\\Generated\\Methods';
    private const CLIENT_FQN = Client::class;

    private const PEER_TYPES_TO_RESOLVE = [
        'InputPeer',
        'InputUser',
        'InputChannel',
        'InputUserFromMessage',
        'InputChannelFromMessage'
    ];

    private array $schema;
    private array $typeToConstructorsMap;
    private array $enumTypes;
    private array $abstractTypes;
    public static array $generatedClasses = [];

    public function __construct(array $typeToConstructorsMap, array $abstractTypes, array $enumTypes)
    {
        if (!file_exists(self::API_SCHEMA_PATH)) {
            throw new RuntimeException("Schema file not found: " . self::API_SCHEMA_PATH);
        }
        $this->schema = json_decode(file_get_contents(self::API_SCHEMA_PATH), true);
        if (!$this->schema) {
            throw new RuntimeException("Failed to parse JSON schema.");
        }
        $this->typeToConstructorsMap = $typeToConstructorsMap;
        $this->abstractTypes = $abstractTypes;
        $this->enumTypes = $enumTypes;
    }

    public function run(): void
    {
        echo "Starting Fluent API generation...\n";
        $this->cleanup();
        $this->generateApiClasses();
        echo "Fluent API generation complete! Files are in '" . realpath(self::OUTPUT_DIR) . "' directory.\n";
    }

    private function cleanup(): void
    {
        if (!is_dir(self::OUTPUT_DIR)) {
            mkdir(self::OUTPUT_DIR, 0777, true);
        }
        $files = new \GlobIterator(self::OUTPUT_DIR . '/*.php');
        foreach ($files as $file) {
            if ($file->isFile()) {
                unlink($file->getPathname());
            }
        }
        self::$generatedClasses = [];
    }

    private function generateApiClasses(): void
    {
        $methodGroups = [];
        $excluded = $this->getExcludedMethods();
        foreach ($this->schema['methods'] as $method) {
            if (in_array($method['method'], $excluded, true)) continue;
            $parts = explode('.', $method['method']);
            if (count($parts) < 2) continue;

            $groupName = array_shift($parts);
            $methodGroups[$groupName][] = $method;
        }

        ksort($methodGroups);

        foreach ($methodGroups as $groupName => $methods) {
            $this->generateMethodGroupClass($groupName, $methods);
        }
    }

    private function generateMethodGroupClass(string $groupName, array $methods): void
    {
        $className = $this->snakeToCamel($groupName) . 'Methods';
        $filePath = self::OUTPUT_DIR . '/' . $className . '.php';

        self::$generatedClasses[$groupName] = [
            'className' => $className,
            'fqcn' => self::BASE_NAMESPACE . '\\' . $className,
        ];

        $this->resetUseTracking();
        $methodsContent = [];

        foreach ($methods as $method) {
            $methodParts = explode('.', $method['method']);
            $methodName = lcfirst($this->snakeToCamel(end($methodParts)));

            $apiMethodParams = $this->buildApiMethodParams($method['params'], $className);
            $paramDefs = $apiMethodParams['definitions'];
            $paramVarsStr = $apiMethodParams['call_vars'];
            $paramDocs = $apiMethodParams['param_docs'];

            $resolveCodeBlock = $this->generateResolveBlock($method['params']);

            $returnTypeInfo = $this->resolvePhpTypeInfo($method['type'], $className, null);

            $returnDocType = $returnTypeInfo['phpdoc_type'];
            if (!str_contains($returnTypeInfo['native_type'], '?')) {
                $returnDocType = str_replace('|null', '', $returnDocType);
            }

            $phpdoc = "    /**\n";
            if (!empty($paramDocs)) {
                $phpdoc .= implode("\n", $paramDocs) . "\n";
            }
            $phpdoc .= "     * @return {$returnDocType}\n";
            $phpdoc .= "     * @see https://core.telegram.org/method/{$method['method']}\n";
            $phpdoc .= "     * @api\n";
            $phpdoc .= "     */\n";

            [$reqNamespace, $reqClassName] = $this->getNamespaceAndClassName($method['method']);
            $requestClassFqn = self::GENERATED_METHODS_NAMESPACE . '\\' . $reqNamespace . '\\' . $reqClassName . 'Request';
            $requestClassShort = $this->registerUse($requestClassFqn, $className, null);

            $call = "\$this->client->callSync(new {$requestClassShort}({$paramVarsStr}))";
            if ($returnTypeInfo['native_type'] === 'bool') $call = "(bool) {$call}";
            if ($returnTypeInfo['native_type'] === 'int') $call = "(int) {$call}";

            // Убираем `?` из нативного типа для возвращаемого значения, так как callSync вернет null или объект
            $nativeReturnType = $returnTypeInfo['native_type'];

            $methodsContent[] = $phpdoc . <<<PHP
                public function {$methodName}({$paramDefs}): {$nativeReturnType}
                {
            {$resolveCodeBlock}        return {$call};
                }
            PHP;
        }

        $this->registerUse(self::CLIENT_FQN, $className, null);
        $methodsContentStr = implode("\n\n", $methodsContent);
        $useBlock = $this->buildUseBlockFromAliasMap(self::BASE_NAMESPACE, null);

        $fileContent = <<<PHP
            <?php declare(strict_types=1);
            namespace ProtoBrick\\MTProtoClient\\Generated\\Api;
            {$useBlock}
            /**
             * DO NOT EDIT. This file is generated automatically.
             *
             * Contains methods for the "{$groupName}" group.
             */
            final readonly class {$className}
            {
                public function __construct(private Client \$client) {}
            
            {$methodsContentStr}
            }
            PHP;

        $this->writeFile($filePath, $fileContent);
    }

    private function buildApiMethodParams(array $params, string $currentClassName): array
    {
        $definitions = [];
        $callVars = [];
        $paramDocs = [];

        $requiredParams = [];
        $optionalParams = [];
        foreach ($params as $param) {
            if ($param['type'] === '#') continue;
            if (str_contains($param['type'], '?')) {
                $optionalParams[] = $param;
            } else {
                $requiredParams[] = $param;
            }
        }
        $sortedParams = array_merge($requiredParams, $optionalParams);

        foreach ($sortedParams as $param) {
            $paramName = $this->sanitizeParamName($param['name']);
            $callVars[] = '$' . $paramName;

            $originalTlType = $param['type'];
            $isConditional = str_contains($originalTlType, '?');
            $actualType = $isConditional ? explode('?', $originalTlType)[1] : $originalTlType;
            if ($actualType === 'true' || $actualType === 'Bool') $actualType = 'bool';

            $typeInfo = $this->resolvePhpTypeInfo($actualType, $currentClassName, null);

            $docType = $typeInfo['phpdoc_type'];
            $nativeType = $typeInfo['native_type'];

            $isPeerType = $this->isInputPeerType($actualType);

            if ($isPeerType) {
                // 1. Очищаем тип от '?' и '|null', полученных из resolvePhpTypeInfo
                // Это гарантирует, что мы начинаем с чистого имени класса (напр. "AbstractInputPeer")
                $cleanType = str_replace(['?', '|null'], '', $nativeType);
                $cleanDocType = str_replace(['|null'], '', $docType);

                // 2. Строим Union Type
                $nativeType = $cleanType . '|string|int';
                $docType = $cleanDocType . '|string|int';

                // 3. Явно добавляем null, если параметр опциональный
                if ($isConditional) {
                    $nativeType .= '|null';
                    $docType .= '|null';
                }
            } else {
                // Стандартная логика для не-пиров
                if ($isConditional) {
                    // Если тип уже nullable (объект или union), то |null в phpdoc уже есть.
                    if (!str_contains($docType, 'null')) {
                        $docType .= '|null';
                    }
                    // Нативный тип тоже делаем nullable, если это не Union Type (в PHP < 8.2 нельзя ?A|B)
                    // Но если это простой объект, добавляем ?
                    if (!str_starts_with($nativeType, '?') && !str_contains($nativeType, '|')) {
                        $nativeType = '?' . $nativeType;
                    } elseif (str_contains($nativeType, '|') && !str_contains($nativeType, 'null')) {
                        $nativeType .= '|null';
                    }
                } else {
                    // Убираем nullable из документации и тайп-хинта, если поле обязательное
                    $docType = str_replace('|null', '', $docType);
                    $nativeType = str_replace(['?', '|null'], '', $nativeType);
                }
            }

            $paramDocs[] = "     * @param {$docType} \${$paramName}";

            $paramDef = "{$nativeType} \${$paramName}";
            if ($isConditional) {
                $paramDef .= " = null";
            }
            $definitions[] = $paramDef;
        }

        return [
            'definitions' => implode(', ', $definitions),
            'call_vars' => implode(', ', $callVars),
            'param_docs' => $paramDocs,
        ];
    }

    private function isInputPeerType(string $type): bool
    {
        return in_array($type, self::PEER_TYPES_TO_RESOLVE, true);
    }

    /**
     * Генерирует PHP-код для автоматического резолвинга пиров.
     */
    private function generateResolveBlock(array $params): string
    {
        $code = "";
        foreach ($params as $param) {
            if ($param['type'] === '#') continue;

            $originalType = $param['type'];
            $actualType = str_contains($originalType, '?') ? explode('?', $originalType)[1] : $originalType;

            if ($this->isInputPeerType($actualType)) {
                $varName = '$' . $this->sanitizeParamName($param['name']);

                $code .= <<<PHP
        if (is_string({$varName}) || is_int({$varName})) {
            {$varName} = \$this->client->peerManager->resolve({$varName});
        }

PHP;
            }
        }
        return $code;
    }
}