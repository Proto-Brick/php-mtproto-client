<?php

declare(strict_types=1);

trait GeneratorHelpers
{
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

    private function mapTlTypeToPhp(string $tlType): string
    {
        if (preg_match('/flags\.\d+\?(.+)/', $tlType, $matches)) {
            $tlType = $matches[1];
        }

        if ($special = $this->getSpecialTypeHandling($tlType)) {
            return $special['php_type'];
        }

        return match ($tlType) {
            'int', 'int32', 'long', 'int64' => 'int', // 32-битные числа - это int
            'int128', 'int256', 'string', 'bytes' => 'string', // 64-битные и больше - это бинарные строки
            'double' => 'float',
            'Bool', 'bool', 'true' => 'bool',
            'Object' => 'array',
            '!X', 'X' => $this->escapeFqn(self::TL_OBJECT_FQN),
            default => $this->resolveCustomType($tlType),
        };
    }

    private function mapTlTypeToPhpdoc(string $tlType): string
    {
        if (str_starts_with($tlType, 'Vector<')) {
            $innerType = substr($tlType, 7, -1);
            if ($innerType === 't') {
                return 'array';
            }
            // Получаем FQCN для внутреннего типа
            $phpInnerTypeFqn = $this->mapTlTypeToPhp($innerType);
            // Извлекаем только короткое имя класса
            $phpInnerTypeShort = basename(str_replace('\\', '/', $phpInnerTypeFqn));

            return "list<{$phpInnerTypeShort}>";
        }

        // Для не-векторных типов делаем то же самое
        $phpTypeFqn = $this->mapTlTypeToPhp($tlType);
        return basename(str_replace('\\', '/', $phpTypeFqn));
    }

    private function resolveCustomType(string $tlType): string
    {
        if (str_starts_with($tlType, 'Vector<')) {
            return 'array';
        }
        $tlType = ltrim($tlType, '%');
        [$namespace, $className] = $this->getNamespaceAndClassName($tlType);
        $basePath = self::BASE_NAMESPACE . '\\Types' . ($namespace ? '\\' . $namespace : '');
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
        $uniqueUses = array_keys($useStatements);
        sort($uniqueUses);

        $escapedCurrentNamespace = $this->escapeFqn($currentNamespace);
        $escapedParentFqcn = $parentFqcn ? $this->escapeFqn($parentFqcn) : null;

        foreach ($uniqueUses as $useFqn) {
            $useFqn = $this->escapeFqn($useFqn);
            $parentOfUse = substr($useFqn, 0, (int) strrpos($useFqn, '\\'));

            // Правило 1: Не импортировать родительский класс, так как он уже есть в `extends`.
            if ($escapedParentFqcn === $useFqn) {
                continue;
            }

            // Правило 2: Не импортировать классы из того же неймспейса.
            if ($escapedCurrentNamespace === $parentOfUse) {
                continue;
            }

            $useBlock .= "use {$useFqn};\n";
        }
        return $useBlock ? "\n" . $useBlock . "\n" : ''; // Добавил перенос строки для красоты
    }

    private function buildConstructorParams(array $params): array
    {
        $paramDefinitions = [];
        $propertyDocs = [];
        $paramDocs = [];
        $useStatements = [];

        // --- Шаг 1: Разделяем параметры на обязательные и опциональные ---
        $requiredParams = [];
        $optionalParams = [];
        foreach ($params as $param) {
            if ($param['type'] === '#') {
                continue;
            }

            if (str_contains($param['type'], '?')) {
                $optionalParams[] = $param;
            } else {
                $requiredParams[] = $param;
            }
        }

        // Объединяем их в правильном порядке: сначала обязательные, потом опциональные
        $sortedParams = array_merge($requiredParams, $optionalParams);
        $sortedPropertyNames = []; // Сохраним порядок имен для вызова конструктора

        foreach ($sortedParams as $param) {
            $originalTlType = $param['type'];
            $isConditional = str_contains($originalTlType, '?');
            $actualType = $isConditional ? explode('?', $originalTlType)[1] : $originalTlType;
            if ($actualType === 'true' || $actualType === 'Bool') {
                $actualType = 'bool';
            }

            $phpTypeFqn = $this->mapTlTypeToPhp($actualType);
            $phpType = basename(str_replace('\\', '/', $phpTypeFqn));
            $docType = $this->mapTlTypeToPhpdoc($actualType);
            $propertyName = $this->sanitizeParamName($param['name']);

            $sortedPropertyNames[] = $propertyName;

            $docTypeForParam = $isConditional ? "{$docType}|null" : $docType;
            $paramDocs[] = "     * @param {$docTypeForParam} \${$propertyName}";

            if (str_starts_with($phpTypeFqn, '\\')) {
                $useStatements[$this->escapeFqn($phpTypeFqn)] = true;
            }

            if ($docType !== $phpTypeFqn && !in_array($docType, ['array', 'int', 'string', 'bool', 'float'], true)) {
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
            'useStatements' => $useStatements,
            'paramDocs' => $paramDocs,
            'sortedPropertyNames' => $sortedPropertyNames, // Возвращаем отсортированные имена
        ];
    }

    private function getSpecialTypeHandling(string $tlType): ?array
    {
        return match ($tlType) {
            'DataJSON', 'JSONValue' => [
                'php_type' => 'array',
                'serialize_tpl' => '(new DataJSON(json_encode(%s)))->serialize($serializer)',
                'deserialize_tpl' => 'json_decode((DataJSON::deserialize($deserializer, $stream))->data, true)',
            ],
            default => null,
        };
    }

    private function buildMethodSpecificContent(array $item): array
    {
        $useStatements = [];
        $tlResponseType = $item['type']; // Например, "Vector<WallPaper>" или "Bool" или "DataJSON"

        $responseClassExpr = '';

        if ($special = $this->getSpecialTypeHandling($tlResponseType)) {
            // Случай 1: Особый тип вроде DataJSON
            $responseClassExpr = "'" . $special['php_type'] . "'";

        } elseif (str_starts_with($tlResponseType, 'Vector<')) {
            // Случай 2: Это вектор. Мы должны вернуть FQCN внутреннего типа.
            // Клиент будет отвечать за вызов правильного десериализатора для векторов.
            $innerType = substr($tlResponseType, 7, -1);
            $phpInnerTypeFqn = $this->mapTlTypeToPhp($innerType);

            // Проверяем, является ли внутренний тип примитивом
            $isPrimitiveInner = in_array($phpInnerTypeFqn, ['bool', 'int', 'float', 'string'], true);
            if ($isPrimitiveInner) {
                // Если вектор примитивов, возвращаем специальную строку, например 'vector<int>'
                $responseClassExpr = "'vector<{$phpInnerTypeFqn}>'";
            } else {
                // Если вектор объектов, возвращаем FQCN внутреннего класса
                $responseTypeShort = basename(str_replace('\\', '/', $phpInnerTypeFqn));
                $responseClassExpr = $responseTypeShort . '::class';
                if (str_contains($phpInnerTypeFqn, '\\')) {
                    $useStatements[$this->escapeFqn($phpInnerTypeFqn)] = true;
                }
            }

        } else {
            // Случай 3: Обычный TL-объект или примитив вроде Bool
            $phpResponseType = $this->mapTlTypeToPhp($tlResponseType);
            $isPrimitive = in_array($phpResponseType, ['bool', 'int', 'float', 'string'], true);

            if ($isPrimitive) {
                $responseClassExpr = "'" . $phpResponseType . "'";
            } else {
                $responseTypeShort = basename(str_replace('\\', '/', $phpResponseType));
                $responseClassExpr = $responseTypeShort . '::class';
                if (str_contains($phpResponseType, '\\')) {
                    $useStatements[$this->escapeFqn($phpResponseType)] = true;
                }
            }
        }

        $content = <<<PHP
    
        public function getMethodName(): string
        {
            return '{$item['method']}';
        }
        
        public function getResponseClass(): string
        {
            return {$responseClassExpr};
        }
    PHP;

        return ['content' => $content, 'useStatements' => $useStatements];
    }

    private function buildFlagsLogic(array $params, array &$useStatements): array
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
            $serializeBody .= "        \$buffer .= \$serializer->int32(\${$flagsName});\n";

            // Десериализация: чтение этого поля флагов
            $deserializeBody .= "        \${$flagsName} = \$deserializer->int32(\$stream);\n";
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
                    : $this->getDeserializationCodeForType($actualType, $useStatements);
                $deserializeBody .= "        \${$propertyName} = (\${$flagsName} & (1 << {$bit})) ? {$expression} : null;\n";
            } else {
                // Обязательное поле
                $serializeBody .= "        \$buffer .= " . $this->getSerializationCodeForType("\$this->{$propertyName}", $param['type']) . ";\n";
                $deserializeBody .= "        \${$propertyName} = " . $this->getDeserializationCodeForType($param['type'], $useStatements) . ";\n";
            }
        }

        return [
            'serializeBody' => rtrim($serializeBody), // Убираем лишние переносы строк в конце
            'deserializeBody' => rtrim($deserializeBody),
            'constructorArgs' => $constructorArgs,
        ];
    }

    private function buildSerializerMethods(array $item, bool $isMethod, bool $isConcreteOfAbstract, array $sortedPropertyNames): array
    {
        $useStatements = [];

        // --- Сборка тела метода serialize() ---
        $serializeBody = "        \$buffer = \$serializer->int32(self::CONSTRUCTOR_ID);\n";
        $logic = $this->buildFlagsLogic($item['params'], $useStatements);
        $serializeBody .= $logic['serializeBody'];

        // --- Сборка тела метода deserialize() ---
        $deserializeBody = "";
        $constructorCall = "";

        if ($isMethod) {
            // --- Вариант 1: Это метод-запрос (Request) ---
            // Его метод deserialize() должен просто бросать исключение.
            $deserializeBody = "        throw new \LogicException('Request objects are not deserializable');";

        } else {
            // --- Вариант 2: Это тип-ответ (DTO) ---
            if ($isConcreteOfAbstract) {
                $deserializeBody = "        \$deserializer->int32(\$stream); // Constructor ID is consumed here.\n";
            } else {
                $deserializeBody = "        \$constructorId = \$deserializer->int32(\$stream);\n" .
                    "        if (\$constructorId !== self::CONSTRUCTOR_ID) {\n" .
                    "            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex(\$constructorId)));\n" .
                    "        }\n\n";
            }
            $deserializeBody .= $logic['deserializeBody'];

            // Собираем аргументы для new self(...) в правильном, отсортированном порядке
            $constructorArgsForCall = [];
            if (!empty($sortedPropertyNames)) {
                $deserializedVars = [];
                foreach ($logic['constructorArgs'] as $varNameWithDollar) {
                    $propName = ltrim($varNameWithDollar, '$');
                    $deserializedVars[$propName] = $varNameWithDollar;
                }

                foreach ($sortedPropertyNames as $propName) {
                    // Обрабатываем возможное добавление `_` из-за зарезервированных слов
                    $sanitizedPropName = $this->sanitizeParamName($propName);
                    if (isset($deserializedVars[$sanitizedPropName])) {
                        $constructorArgsForCall[] = $deserializedVars[$sanitizedPropName];
                    } else {
                        throw new \Exception("Could not map property '{$propName}' for constructor call.");
                    }
                }
            }

            $constructorCall = empty($constructorArgsForCall)
                ? ''
                : "\n            " . implode(",\n            ", $constructorArgsForCall) . "\n        ";

            // Добавляем финальный return для DTO
            $deserializeBody .= "\n            return new self({$constructorCall});";
        }

        // --- Сборка финального PHP-кода для обоих методов ---
        $content = <<<PHP
    
        public function serialize(Serializer \$serializer): string
        {
    {$serializeBody}
            return \$buffer;
        }
    
        public static function deserialize(Deserializer \$deserializer, string &\$stream): static
        {
    {$deserializeBody}
        }
    PHP;

        return ['content' => $content, 'useStatements' => $useStatements];
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
                return "\$serializer->int32({$varName})";
            case 'long':
            case 'int64':
                return "\$serializer->int64({$varName})";
            case 'int128': return "\$serializer->int128({$varName})";
            case 'int256': return "\$serializer->int256({$varName})";
            case 'double': return "pack('d', {$varName})";
            case 'string':
            case 'bytes':
                return "\$serializer->bytes({$varName})";
            case 'bool':
                return "({$varName} ? \$serializer->int32(0x997275b5) : \$serializer->int32(0xbc799737))";
            default:
                if (str_starts_with($tlType, 'Vector<')) {
                    $innerType = substr($tlType, 7, -1);

                    return match ($innerType) {
                        'int' => "\$serializer->vectorOfInts({$varName})",
                        'long' => "\$serializer->vectorOfLongs({$varName})",
                        'string', 'bytes' => "\$serializer->vectorOfStrings({$varName})",
                        default => "\$serializer->vectorOfObjects({$varName})",
                    };
                }
                return "{$varName}->serialize(\$serializer)";
        }
    }

    private function getDeserializationCodeForType(string $tlType, array &$useStatements): string
    {
        if ($special = $this->getSpecialTypeHandling($tlType)) {
            if ($tlType === 'DataJSON' || $tlType === 'JSONValue') {
                // Добавляем use, так как шаблон использует класс DataJSON
                $useStatements['DigitalStars\\MtprotoClient\\Generated\\Types\\Base\\DataJSON'] = true;
            }
            return $special['deserialize_tpl'];
        }
        $tlTypeLower = strtolower($tlType);
        switch ($tlTypeLower) {
            case 'int':
            case 'int32':
                return "\$deserializer->int32(\$stream)";
            case 'long':
            case 'int64':
                return "\$deserializer->int64(\$stream)";
            case 'int128': return "\$deserializer->int128(\$stream)";
            case 'int256': return "\$deserializer->int256(\$stream)";
            case 'double': return "\$deserializer->double(\$stream)";
            case 'string':
            case 'bytes':
                return "\$deserializer->bytes(\$stream)";
            case 'bool':
                return "(\$deserializer->int32(\$stream) === 0x997275b5)";
            default:
                if (str_starts_with($tlType, 'Vector<')) {
                    $innerType = substr($tlType, 7, -1);

                    if ($innerType === 'int') {
                        return "\$deserializer->vectorOfInts(\$stream)";
                    }
                    if ($innerType === 'long') {
                        return "\$deserializer->vectorOfLongs(\$stream)";
                    }
                    if ($innerType === 'string' || $innerType === 'bytes') {
                        return "\$deserializer->vectorOfStrings(\$stream)";
                    }

                    // Старая логика для векторов объектов
                    [$ns, $class] = $this->getNamespaceAndClassName($innerType);
                    $isAbstract = isset($this->abstractTypes[$innerType]);
                    $classPrefix = $isAbstract ? 'Abstract' : '';
                    $className = $classPrefix . $class;
                    $fqcn = self::BASE_NAMESPACE . '\\Types\\' . ($ns ? $ns . '\\' : '') . $className;
                    $useStatements[$fqcn] = true;
                    $shortClass = $className;
                    return "\$deserializer->vectorOfObjects(\$stream, [{$shortClass}::class, 'deserialize'])";
                }

                // Этот код будет выполнен, если это не вектор, а обычный кастомный тип (updates.State и т.д.)
                [$ns, $class] = $this->getNamespaceAndClassName($tlType);
                $isAbstract = isset($this->abstractTypes[$tlType]);
                $classPrefix = $isAbstract ? 'Abstract' : '';
                $className = $classPrefix . $class;
                $fqcn = self::BASE_NAMESPACE . '\\Types\\' . ($ns ? $ns . '\\' : '') . $className;
                $useStatements[$fqcn] = true;
                $shortClass = $className;

                return "{$shortClass}::deserialize(\$deserializer, \$stream)";
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
            $matchArms[] = "            {$callableClass}::CONSTRUCTOR_ID => {$callableClass}::deserialize(\$deserializer, \$stream),";
        }

        // Добавляем default-ветку
        $matchArms[] = "            default => throw new \Exception('Unknown constructor ID for type {$abstractType}: ' . dechex(\$constructorId)),";

        $cases = implode("\n", $matchArms);
        $useBlock = $this->buildUseBlock($useStatementsForFactory, $fullParentNamespace, null);

        // Добавляем @var static, чтобы помочь статическим анализаторам (PHPStan/Psalm)
        // правильно вывести тип после сложного match-выражения. Без этого они
        // могут ошибочно посчитать, что возвращаемый тип несовместим со static.
        $body = <<<PHP
        public static function deserialize(Deserializer \$deserializer, string &\$stream): static
        {
            // Peek at the constructor ID to determine the concrete type
            \$constructorId = \$deserializer->peekInt32(\$stream);
            
            \$result = match (\$constructorId) {
    {$cases}
            };

            /** @var static \$result */
            return \$result;
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
