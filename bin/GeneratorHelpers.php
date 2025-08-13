<?php

declare(strict_types=1);

trait GeneratorHelpers
{
    private const GENERATED_TYPES_NAMESPACE = 'DigitalStars\\MtprotoClient\\Generated\\Types';

    /**
     * @var array<string, string> Карта [КороткоеИмяКласса => ПолноеИмяКласса] для отслеживания конфликтов.
     */
    private array $shortNameToFqnMap = [];

    /**
     * @var array<string, string> Карта [ПолноеИмяКласса => Алиас_Или_КороткоеИмя]
     */
    private array $fqnToAliasMap = [];

    /**
     * Очищает состояние отслеживания use-стейтментов.
     * Вызывается перед генерацией каждого нового файла.
     */
    private function resetUseTracking(): void
    {
        $this->shortNameToFqnMap = [];
        $this->fqnToAliasMap = [];
    }

    private function registerUse(string $fqn, string $currentClassName, ?string $parentFqcn): string
    {
        $fqn = $this->escapeFqn($fqn);
        if (!str_contains($fqn, '\\')) {
            return $fqn;
        }

        if (isset($this->fqnToAliasMap[$fqn])) {
            return $this->fqnToAliasMap[$fqn];
        }

        $shortName = basename(str_replace('\\', '/', $fqn));
        $parentShortName = $parentFqcn ? basename(str_replace('\\', '/', $this->escapeFqn($parentFqcn))) : null;

        $isConflict = false;
        if (isset($this->shortNameToFqnMap[$shortName]) && $this->shortNameToFqnMap[$shortName] !== $fqn) {
            $isConflict = true;
        } elseif ($shortName === $currentClassName) {
            $isConflict = true;
        } elseif ($shortName === $parentShortName && $fqn !== $this->escapeFqn($parentFqcn)) {
            $isConflict = true;
        }

        if ($isConflict) {
            $parts = explode('\\', $fqn);
            $namespacePart = $parts[count($parts) - 2] ?? 'Dto';
            $alias = ucfirst($this->snakeToCamel($namespacePart)) . $shortName;
            $this->fqnToAliasMap[$fqn] = $alias;
            if (!isset($this->shortNameToFqnMap[$shortName])) {
                $this->shortNameToFqnMap[$shortName] = $fqn;
            }
            return $alias;
        }

        $this->shortNameToFqnMap[$shortName] = $fqn;
        $this->fqnToAliasMap[$fqn] = $shortName;
        return $shortName;
    }

    /**
     * Собирает и форматирует итоговый use-блок на основе зарегистрированных классов и их алиасов.
     */
    private function buildUseBlockFromAliasMap(string $currentNamespace, ?string $parentFqcn): string
    {
        $useStatements = [];
        foreach ($this->fqnToAliasMap as $fqn => $alias) {
            $shortName = basename(str_replace('\\', '/', $fqn));
            if ($shortName === $alias) {
                $useStatements[$fqn] = true;
            } else {
                $useStatements[$fqn] = $alias;
            }
        }
        return $this->buildUseBlock($useStatements, $currentNamespace, $parentFqcn);
    }

    private function getNamespaceAndClassName(string $predicate): array
    {
        $parts = explode('.', $predicate);
        $className = $this->snakeToCamel(array_pop($parts));
        $namespace = empty($parts) ? null : implode('\\', array_map([$this, 'snakeToCamel'], $parts));
        if (!$namespace) {
            $namespace = 'Base';
        }
        return [$namespace, $className];
    }

    private function mapTlTypeToPhp(string $tlType, $currentClassName): string
    {
        if (preg_match('/flags\.\d+\?(.+)/', $tlType, $matches)) {
            $tlType = $matches[1];
        }

        $isInternalJsonClass = in_array($currentClassName, ['JSONObjectValue', 'JsonArray'], true);
        if ($isInternalJsonClass && $tlType === 'JSONValue') {
            return $this->resolveCustomType('JSONValue'); // Вернет FQN для AbstractJSONValue
        }

        if ($special = $this->getSpecialTypeHandling($tlType)) {
            return $special['php_type'];
        }

        return match ($tlType) {
            'int', 'int32', 'long', 'int64' => 'int', // 32-битные числа - это int
            'int128', 'int256', 'string', 'bytes' => 'string', // 64-битные и больше - это бинарные строки
            'double' => 'float',
            'Bool', 'bool' => 'bool',
            'true' => 'true',
            'Object' => 'array',
            '!X', 'X' => $this->escapeFqn(self::TL_OBJECT_FQN),
            default => $this->resolveCustomType($tlType),
        };
    }

    private function mapTlTypeToPhpdoc(string $tlType, string $currentClassName, ?string $parentFqcn): string
    {
        if (str_starts_with($tlType, 'Vector<')) {
            $innerType = substr($tlType, 7, -1);
            if ($innerType === 't') {
                return 'array';
            }
            $innerDocType = $this->mapTlTypeToPhpdoc($innerType, $currentClassName, $parentFqcn);

            return "list<{$innerDocType}>";
        }

        // Для не-векторных типов делаем то же самое
        $phpTypeFqn = $this->mapTlTypeToPhp($tlType, $currentClassName);
        if (!str_contains($phpTypeFqn, '\\')) {
            return $phpTypeFqn; // Это примитив
        }

        // Для одиночных объектов тоже используем `registerUse`
        return $this->registerUse($phpTypeFqn, $currentClassName, $parentFqcn);
    }

    private function resolveCustomType(string $tlType): string
    {
        if (isset($this->enumTypes[$tlType])) {
            [$namespace, $className] = $this->getNamespaceAndClassName($tlType);
            return $this->escapeFqn(
                self::GENERATED_TYPES_NAMESPACE . ($namespace ? '\\' . $namespace : '') . '\\' . $className
            );
        }
        if (str_starts_with($tlType, 'Vector<')) {
            return 'array';
        }
        $tlType = ltrim($tlType, '%');
        [$namespace, $className] = $this->getNamespaceAndClassName($tlType);
        $basePath = self::GENERATED_TYPES_NAMESPACE . ($namespace ? '\\' . $namespace : '');
        if (isset($this->abstractTypes[$tlType])) {
            return $this->escapeFqn($basePath . '\\Abstract' . $className);
        }
        return $this->escapeFqn($basePath . '\\' . $className);
    }

    private function sanitizeParamName(string $name): string
    {
        $camelName = lcfirst($this->snakeToCamel($name));
        $reserved = [
            'list',
            'string',
            'int',
            'float',
            'bool',
            'array',
            'object',
            'mixed',
            'default',
            'new',
            'clone',
            'enum',
            'final',
            'for',
            'switch',
            'abstract',
        ];
        if (in_array(strtolower($camelName), $reserved, true)) {
            return $camelName . '_';
        }
        return $camelName;
    }

    private function snakeToCamel(string $string): string
    {
        return str_replace('_', '', ucwords($string, '_'));
    }

    private function escapeFqn(string $fqn): string
    {
        return ltrim($fqn, '\\');
    }

    private function getExcludedConstructors(): array
    {
        return [
            // Псевдо-конструкторы из API-схемы, которые не являются DTO
            // и для которых не нужно генерировать PHP-классы.
            'vector',
            'boolTrue',
            'boolFalse',
            'null',
            'true',
            'error',
        ];
    }

    private function isBuiltInType(string $type): bool
    {
        return in_array(
            $type,
            [
                // Псевдо-типы из tdesktop
                'Int', 'Long', 'Double', 'String', 'Int128', 'Int256',

                'Vector t', 'X', '!X', 'True', 'Bool', 'Null', 'Error',

                // Примитивы
                'int', 'long', 'double', 'string', 'bytes'
            ],
            true
        );
    }

    private function getExcludedMethods(): array
    {
        return [
            'invokeWithLayer',
            'invokeWithoutUpdates',
            'invokeAfterMsg',
            'invokeAfterMsgs',
            'initConnection',
            'invokeWithMessagesRange',
            'invokeWithTakeout',
            'invokeWithGooglePlayIntegrity',
            'invokeWithApnsSecret',
            'invokeWithBusinessConnection',
        ];
    }

    private function writeFile(string $filePath, string $content): void
    {
        if (!is_dir($dir = dirname($filePath))) {
            mkdir($dir, 0777, true);
        }
        file_put_contents($filePath, $content);
    }

    private function buildUseBlock(array $useStatements, string $currentNamespace, ?string $parentFqcn): string
    {
        $useBlock = '';
        ksort($useStatements);

        $escapedCurrentNamespace = $this->escapeFqn($currentNamespace);
        $escapedParentFqcn = $parentFqcn ? $this->escapeFqn($parentFqcn) : null;

        foreach ($useStatements as $useFqn => $aliasOrTrue) {
            $useFqn = $this->escapeFqn($useFqn);
            $parentOfUse = substr($useFqn, 0, (int) strrpos($useFqn, '\\'));

            // Правило 1: Не импортировать родительский класс.
            if ($escapedParentFqcn === $useFqn) {
                continue;
            }

            // Правило 2: Не импортировать классы из того же неймспейса.
            if ($escapedCurrentNamespace === $parentOfUse) {
                continue;
            }

            // Генерируем `use` с алиасом или без
            if (is_string($aliasOrTrue)) {
                $useBlock .= "use {$useFqn} as {$aliasOrTrue};\n";
            } else {
                $useBlock .= "use {$useFqn};\n";
            }
        }
        return $useBlock ? "\n" . $useBlock . "\n" : ''; // Добавил перенос строки для красоты
    }

    private function buildConstructorParams(array $params, string $currentClassName, ?string $parentFqcn): array
    {
        $paramDefinitions = [];
        $propertyDocs = [];
        $paramDocs = [];
        // $useStatements больше не нужен

        // --- Шаг 1: Разделяем параметры ... (остается без изменений)
        $requiredParams = [];
        $optionalParams = [];
        foreach ($params as $param) {
            if ($param['type'] === '#') { continue; }
            if (str_contains($param['type'], '?')) { $optionalParams[] = $param; }
            else { $requiredParams[] = $param; }
        }
        $sortedParams = array_merge($requiredParams, $optionalParams);
        $sortedPropertyNames = [];

        foreach ($sortedParams as $param) {
            $originalTlType = $param['type'];
            $isConditional = str_contains($originalTlType, '?');
            $actualType = $isConditional ? explode('?', $originalTlType)[1] : $originalTlType;

            $phpTypeFqn = $this->mapTlTypeToPhp($actualType, $currentClassName);
            // Вызываем registerUse для php-типа, чтобы он был добавлен в use-блок
            $phpType = $this->registerUse($phpTypeFqn, $currentClassName, $parentFqcn);
            // mapTlTypeToPhpdoc тоже вызывает registerUse, но это не страшно, т.к. есть проверка
            $docType = $this->mapTlTypeToPhpdoc($actualType, $currentClassName, $parentFqcn);
            $propertyName = $this->sanitizeParamName($param['name']);

            $sortedPropertyNames[] = $propertyName;

            $docTypeForParam = $isConditional ? "{$docType}|null" : $docType;
            $paramDocs[] = "     * @param {$docTypeForParam} \${$propertyName}";

            if ($docType !== $phpType && !in_array($docType, ['array', 'int', 'string', 'bool', 'float'], true)) {
                $propertyDocs[] = " * @property {$docType} \${$propertyName}";
            }

            $typeHint = $isConditional ? "?{$phpType}" : $phpType;
            $paramDef = "public readonly {$typeHint} \${$propertyName}";
            if ($isConditional) {
                $paramDef .= " = null";
            }
            $paramDefinitions[] = $paramDef;
        }

        return [
            'paramsString' => empty($paramDefinitions) ? '' : "\n        " . implode(",\n        ", $paramDefinitions) . "\n    ",
            'propertyDocs' => $propertyDocs,
            // 'useStatements' УБРАЛИ
            'paramDocs' => $paramDocs,
            'sortedPropertyNames' => $sortedPropertyNames,
        ];
    }

    private function getSpecialTypeHandling(string $tlType): ?array
    {
        return match ($tlType) {
            // Обработчик для DataJSON: это просто TL-строка (bytes), содержащая JSON.
            // Используется в bots.sendCustomRequest
            'DataJSON' => [
                'php_type' => 'array',
                'serialize_tpl' => 'Serializer::serializeDataJSON(%s)',
                'deserialize_tpl' => 'Deserializer::deserializeDataJSON($stream)',
            ],

            // Обработчик для JSONValue: это сложный TL-объект, представляющий JSON.
            // Используется в help.getAppConfig
            'JSONValue' => [
                'php_type' => 'array', // warning: по спецификации, тут должен json объект, но на практике пока в схеме только array
                'serialize_tpl' => 'Serializer::serializeJsonValue(%s)',
                'deserialize_tpl' => 'Deserializer::deserializeJsonValue($stream)',
            ],
            default => null,
        };
    }

    private function buildMethodSpecificContent(array $item, string $currentClassName, ?string $parentFqcn): string
    {
        // $useStatements больше не нужен
        $tlResponseType = $item['type'];
        $responseClassExpr = '';

        if ($special = $this->getSpecialTypeHandling($tlResponseType)) {
            $responseClassExpr = "'" . $special['php_type'] . "'";
        } elseif (str_starts_with($tlResponseType, 'Vector<')) {
            $innerType = substr($tlResponseType, 7, -1);
            $phpInnerTypeFqn = $this->mapTlTypeToPhp($innerType, $currentClassName);
            $isPrimitiveInner = in_array($phpInnerTypeFqn, ['bool', 'int', 'float', 'string'], true);

            if ($isPrimitiveInner) {
                $responseClassExpr = "'vector<{$phpInnerTypeFqn}>'";
            } else {
                // Регистрируем тип и получаем его короткое имя или алиас
                $innerTypeShortName = $this->registerUse($phpInnerTypeFqn, $currentClassName, $parentFqcn);
                $responseClassExpr = "'vector<' . " . $innerTypeShortName . "::class . '>'";
            }
        } else {
            $phpResponseTypeFqn = $this->mapTlTypeToPhp($tlResponseType, $currentClassName);
            $isPrimitive = in_array($phpResponseTypeFqn, ['bool', 'int', 'float', 'string'], true);

            if ($isPrimitive) {
                $responseClassExpr = "'" . $phpResponseTypeFqn . "'";
            } else {
                // Регистрируем тип и получаем его короткое имя или алиас
                $responseTypeShortName = $this->registerUse($phpResponseTypeFqn, $currentClassName, $parentFqcn);
                $responseClassExpr = $responseTypeShortName . '::class';
            }
        }

        return <<<PHP
    
        public function getMethodName(): string
        {
            return '{$item['method']}';
        }
        
        public function getResponseClass(): string
        {
            return {$responseClassExpr};
        }
    PHP;
    }

    private function buildFlagsLogic(array $params, array &$useStatements, $currentClassName, ?string $parentFqcn): array
    {
        $serializeBody = "";
        $deserializeBody = "";
        $constructorArgs = [];

        // --- ФАЗА 1: Генерация кода для ВСЕХ полей флагов ---
        $flagDefinitions = array_filter($params, static fn($p) => $p['type'] === '#');

        foreach ($flagDefinitions as $flagDef) {
            $flagsName = $this->sanitizeParamName($flagDef['name']);

            // Сериализация: вычисление значения для этого поля флагов
            $s_flagsCalc = "        \${$flagsName} = 0;\n";
            foreach ($params as $p) {
                // Ищем все условные поля, которые относятся к НАШЕМУ флагу (flags, flags2, etc.)
                if (str_contains($p['type'], '?') && str_starts_with($p['type'], $flagDef['name'] . '.')) {
                    preg_match('/(flags\d*)\.(\d+)\?/', $p['type'], $m);
                    $check = str_ends_with($p['type'], '?true')
                        ? "\$this->{$this->sanitizeParamName($p['name'])}"
                        : "\$this->{$this->sanitizeParamName($p['name'])} !== null";
                    $s_flagsCalc .= "        if ({$check}) \${$flagsName} |= (1 << {$m[2]});\n";
                }
            }
            $serializeBody .= $s_flagsCalc;
            $serializeBody .= "        \$buffer .= Serializer::int32(\${$flagsName});\n";

            // Десериализация: чтение этого поля флагов
            $deserializeBody .= "        \${$flagsName} = Deserializer::int32(\$stream);\n";
        }
        if (!empty($flagDefinitions)) {
            $serializeBody .= "\n";
            $deserializeBody .= "\n";
        }


        // --- ФАЗА 2: ЕДИНЫЙ ЦИКЛ для всех остальных полей в их исходном порядке ---
        foreach ($params as $param) {
            if ($param['type'] === '#') {
                continue;
            }

            $propertyName = $this->sanitizeParamName($param['name']);
            $constructorArgs[] = "\$" . $propertyName;

            if (str_contains($param['type'], '?')) {
                // Условное поле
                preg_match('/(flags\d*)\.(\d+)\?(.+)/', $param['type'], $matches);
                $flagsName = $this->sanitizeParamName($matches[1]);
                $bit = $matches[2];
                $actualType = $matches[3];

                // Сериализация (запись значения, только если бит установлен)
                if ($actualType !== 'true') {
                    $serializeBody .= "        if (\${$flagsName} & (1 << {$bit})) {\n";
                    $serializeBody .= "            \$buffer .= " . $this->getSerializationCodeForType("\$this->{$propertyName}", $actualType) . ";\n";
                    $serializeBody .= "        }\n";
                }

                // Десериализация (чтение значения, только если бит установлен)
                $expression = ($actualType === 'true')
                    ? "true"
                    : $this->getDeserializationCodeForType($actualType, $useStatements, $currentClassName, $parentFqcn);
                $deserializeBody .= "        \${$propertyName} = (\${$flagsName} & (1 << {$bit})) ? {$expression} : null;\n";
            } else {
                // Обязательное поле
                $serializeBody .= "        \$buffer .= " . $this->getSerializationCodeForType("\$this->{$propertyName}", $param['type']) . ";\n";
                $deserializeBody .= "        \${$propertyName} = " . $this->getDeserializationCodeForType($param['type'], $useStatements, $currentClassName, $parentFqcn) . ";\n";
            }
        }

        return [
            'serializeBody' => rtrim($serializeBody), // Убираем лишние переносы строк в конце
            'deserializeBody' => rtrim($deserializeBody),
            'constructorArgs' => $constructorArgs,
        ];
    }

    private function buildSerializerMethods(
        array $item,
        bool $isMethod,
        bool $isConcreteOfAbstract,
        array $sortedPropertyNames,
        string $currentClassName,
        ?string $parentFqcn
    ): string  {
        $params = $item['params'];

        // --- Тело serialize() ---
        $serializeBody = "        \$buffer = Serializer::int32(self::CONSTRUCTOR_ID);\n";
        $flagCalculations = "";
        $flagDefinitions = array_filter($params, static fn($p) => $p['type'] === '#');

        // Шаг 1: Инициализируем переменные для флагов
        foreach ($flagDefinitions as $flagDef) {
            $flagVarName = $this->sanitizeParamName($flagDef['name']);
            $flagCalculations .= "        \${$flagVarName} = 0;\n";
        }

        // Шаг 2: Вычисляем значения флагов
        if (!empty($flagDefinitions)) {
            foreach ($params as $param) {
                if (preg_match('/(flags\d*)\.(\d+)\?/', $param['type'], $m)) {
                    $flagVarName = $this->sanitizeParamName($m[1]);
                    $bit = $m[2];
                    $propName = $this->sanitizeParamName($param['name']);
                    $check = str_ends_with($param['type'], '?true')
                        ? "\$this->{$propName}"
                        : "\$this->{$propName} !== null";
                    $flagCalculations .= "        if ({$check}) \${$flagVarName} |= (1 << {$bit});\n";
                }
            }
            $serializeBody .= $flagCalculations;
        }

        // Шаг 3: Проходим по всем параметрам в их ИСХОДНОМ порядке и генерируем код сериализации
        foreach ($params as $param) {
            $propName = $this->sanitizeParamName($param['name']);

            if ($param['type'] === '#') {
                $serializeBody .= "        \$buffer .= Serializer::int32(\${$propName});\n";
                continue;
            }

            if (str_contains($param['type'], '?')) {
                preg_match('/(flags\d*)\.(\d+)\?(.+)/', $param['type'], $m);
                $flagVarName = $this->sanitizeParamName($m[1]);
                $actualType = $m[3];
                if ($actualType !== 'true') {
                    $serializeBody .= "        if (\${$flagVarName} & (1 << {$m[2]})) {\n";
                    $serializeBody .= "            \$buffer .= " . $this->getSerializationCodeForType("\$this->{$propName}", $actualType) . ";\n";
                    $serializeBody .= "        }\n";
                }
            } else {
                $serializeBody .= "        \$buffer .= " . $this->getSerializationCodeForType("\$this->{$propName}", $param['type']) . ";\n";
            }
        }

        // --- Тело deserialize() ---
        $deserializeBody = "";
        if ($isMethod) {
            $deserializeBody = "        throw new \LogicException('Request objects are not deserializable');";
        } else {
            if ($isConcreteOfAbstract) {
                $deserializeBody = "        Deserializer::int32(\$stream); // Constructor ID\n";
            } else {
                $deserializeBody = "        \$constructorId = Deserializer::int32(\$stream);\n" .
                    "        if (\$constructorId !== self::CONSTRUCTOR_ID) {\n" .
                    "            throw new \Exception('Invalid constructor ID for ' . self::class);\n" .
                    "        }\n";
            }

            $localVars = [];
            // Проходим по параметрам в ИСХОДНОМ порядке и генерируем код десериализации
            foreach ($params as $param) {
                $propName = $this->sanitizeParamName($param['name']);
                $localVars[$propName] = '$' . $propName;

                if ($param['type'] === '#') {
                    $deserializeBody .= "        \${$propName} = Deserializer::int32(\$stream);\n";
                    continue;
                }

                if (str_contains($param['type'], '?')) {
                    preg_match('/(flags\d*)\.(\d+)\?(.+)/', $param['type'], $m);
                    $flagVarName = $this->sanitizeParamName($m[1]);
                    $actualType = $m[3];
                    $expression = ($actualType === 'true')
                        ? "true"
                        : $this->getDeserializationCodeForType($actualType, $currentClassName, $parentFqcn);

                    $deserializeBody .= "        \${$propName} = (\${$flagVarName} & (1 << {$m[2]})) ? {$expression} : null;\n";
                } else {
                    $deserializeBody .= "        \${$propName} = " . $this->getDeserializationCodeForType($param['type'], $currentClassName, $parentFqcn) . ";\n";
                }
            }

            // Собираем вызов конструктора, используя $sortedPropertyNames, чтобы порядок аргументов совпал
            $constructorArgsForCall = [];
            foreach ($sortedPropertyNames as $propName) {
                if (isset($localVars[$propName])) {
                    $constructorArgsForCall[] = $localVars[$propName];
                }
            }
            $constructorCall = empty($constructorArgsForCall)
                ? ''
                : "\n            " . implode(",\n            ", $constructorArgsForCall) . "\n        ";

            $deserializeBody .= "\n        return new self({$constructorCall});";
        }

        $content = <<<PHP
    
        public function serialize(): string
        {
    {$serializeBody}
            return \$buffer;
        }
    
        public static function deserialize(string &\$stream): static
        {
    {$deserializeBody}
        }
    PHP;

        return $content;
    }

    private function getSerializationCodeForType(string $varName, string $tlType): string
    {
        if ($special = $this->getSpecialTypeHandling($tlType)) {
            return sprintf($special['serialize_tpl'], $varName);
        }

        $tlTypeLower = strtolower($tlType);
        switch ($tlTypeLower) {
            case 'int':
            case 'int32':
                return "Serializer::int32({$varName})";
            case 'long':
            case 'int64':
                return "Serializer::int64({$varName})";
            case 'int128': return "Serializer::int128({$varName})";
            case 'int256': return "Serializer::int256({$varName})";
            case 'double': return "pack('d', {$varName})";
            case 'string':
            case 'bytes':
                return "Serializer::bytes({$varName})";
            case 'bool':
                return "({$varName} ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737))";
            default:
                if (str_starts_with($tlType, 'Vector<')) {
                    $innerType = substr($tlType, 7, -1);

                    return match ($innerType) {
                        'int' => "Serializer::vectorOfInts({$varName})",
                        'long' => "Serializer::vectorOfLongs({$varName})",
                        'string', 'bytes' => "Serializer::vectorOfStrings({$varName})",
                        default => "Serializer::vectorOfObjects({$varName})",
                    };
                }
                return "{$varName}->serialize()";
        }
    }

    private function getDeserializationCodeForType(string $tlType, $currentClassName, ?string $parentFqcn): string
    {
        if ($special = $this->getSpecialTypeHandling($tlType)) {
            if ($tlType === 'DataJSON' || $tlType === 'JSONValue') {
                $this->registerUse('DigitalStars\\MtprotoClient\\Generated\\Types\\Base\\DataJSON', $currentClassName, $parentFqcn);
            }
            return $special['deserialize_tpl'];
        }

        $tlTypeLower = strtolower($tlType);
        switch ($tlTypeLower) {
            case 'int':
            case 'int32':
                return "Deserializer::int32(\$stream)";
            case 'long':
            case 'int64':
                return "Deserializer::int64(\$stream)";
            case 'int128': return "Deserializer::int128(\$stream)";
            case 'int256': return "Deserializer::int256(\$stream)";
            case 'double': return "Deserializer::double(\$stream)";
            case 'string':
            case 'bytes':
                return "Deserializer::bytes(\$stream)";
            case 'bool':
                return "(Deserializer::int32(\$stream) === 0x997275b5)";
            default:
                if (str_starts_with($tlType, 'Vector<')) {
                    $innerType = substr($tlType, 7, -1);

                    if ($innerType === 'int') {
                        return "Deserializer::vectorOfInts(\$stream)";
                    }
                    if ($innerType === 'long') {
                        return "Deserializer::vectorOfLongs(\$stream)";
                    }
                    if ($innerType === 'string' || $innerType === 'bytes') {
                        return "Deserializer::vectorOfStrings(\$stream)";
                    }

                    // Рекурсивный вызов для векторов объектов. Это правильно.
                    $deserializationCode = $this->getDeserializationCodeForType($innerType, $currentClassName, $parentFqcn);
                    // Извлекаем имя класса (которое уже может быть алиасом)
                    $callableClass = explode('::', $deserializationCode)[0];
                    return "Deserializer::vectorOfObjects(\$stream, [{$callableClass}::class, 'deserialize'])";
                }

                // --- ИСПРАВЛЕННАЯ ЛОГИКА ДЛЯ ОДИНОЧНЫХ ОБЪЕКТОВ ---

                // 1. Получаем полное имя класса (FQCN) с помощью хелпера, который уже все умеет.
                $fqcn = $this->resolveCustomType($tlType);

                // 2. Регистрируем FQCN. Эта функция сама разберется с конфликтами,
                // создаст алиас если нужно, и вернет имя, которое можно использовать в коде.
                $callableClass = $this->registerUse($fqcn, $currentClassName, $parentFqcn);

                // 3. Возвращаем строку для десериализации.
                return "{$callableClass}::deserialize(\$stream)";
        }
    }

    private function buildAbstractDeserializerBody(string $abstractType): string
    {
        [$parentNamespace, ] = $this->getNamespaceAndClassName($abstractType);
        $fullParentNamespace = self::BASE_NAMESPACE . '\\Types' . ($parentNamespace ? '\\' . $parentNamespace : '');

        $matchArms = []; // Используем массив вместо конкатенации строк
        if (empty($this->typeToConstructorsMap[$abstractType])) {
            return '';
        }

        $useStatementsForFactory = [];

        foreach ($this->typeToConstructorsMap[$abstractType] as $constructor) {
            [$ns, $class] = $this->getNamespaceAndClassName($constructor['predicate']);
            $fullChildNamespace = self::BASE_NAMESPACE . '\\Types' . ($ns ? '\\' . $ns : '');

            $callableClass = $class;
            $fqcn = $fullChildNamespace . '\\' . $class;
            if ($fullParentNamespace !== $fullChildNamespace) {
                $useStatementsForFactory[$fqcn] = true;
            }

            // Генерируем "руку" для match-выражения
            $matchArms[] = "            {$callableClass}::CONSTRUCTOR_ID => {$callableClass}::deserialize(\$stream),";
        }

        // Добавляем default-ветку
        $matchArms[] = "            default => throw new \Exception(sprintf('Unknown constructor ID for type {$abstractType}. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex(\$constructorId), unpack('l', pack('V', \$constructorId))[1], \$constructorId)),";

        $cases = implode("\n", $matchArms);
        $useBlock = $this->buildUseBlock($useStatementsForFactory, $fullParentNamespace, null);

        // Добавляем @var static, чтобы помочь статическим анализаторам (PHPStan/Psalm)
        // правильно вывести тип после сложного match-выражения. Без этого они
        // могут ошибочно посчитать, что возвращаемый тип несовместим со static.
        $body = <<<PHP
        public static function deserialize(string &\$stream): static
        {
            // Peek at the constructor ID to determine the concrete type
            \$constructorId = Deserializer::peekInt32(\$stream);
            
            return match (\$constructorId) {
    {$cases}
            };
        }
    PHP;

        [$namespace, $className] = $this->getNamespaceAndClassName($abstractType);
        $abstractClassName = 'Abstract' . $className;
        $fullNamespace = self::BASE_NAMESPACE . '\\Types' . ($namespace ? '\\' . $namespace : '');
        $baseClass = basename(str_replace('\\', '/', self::TL_OBJECT_FQN));

        return <<<PHP
    <?php declare(strict_types=1);
    namespace {$fullNamespace};

    use DigitalStars\\MtprotoClient\\TL\\Deserializer;
    use {$this->escapeFqn(self::TL_OBJECT_FQN)};{$useBlock}
    /**
     * @see https://core.telegram.org/type/{$abstractType}
     */
    abstract class {$abstractClassName} extends {$baseClass}
    {
    {$body}
    }
    PHP;
    }
}