<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\TL;

use DigitalStars\MtprotoClient\TL\Contracts\Serializable;
use DigitalStars\MtprotoClient\TL\Contracts\TlObjectInterface;

/**
 * Абстрактный базовый класс для всех генерируемых TL-объектов.
 */
abstract class TlObject implements TlObjectInterface, Serializable
{
    // --- НАЧАЛО ИЗМЕНЕНИЙ ---

    // Метод getConstructorId() должен быть реализован в дочерних классах через константу
    public function getConstructorId(): int
    {
        return static::CONSTRUCTOR_ID;
    }

    // Метод getPredicate() должен быть реализован в дочерних классах через свойство $_
    public function getPredicate(): string
    {
        return $this->_;
    }

    // Объявляем абстрактные методы, чтобы удовлетворить интерфейс Serializable
    // и заставить дочерние классы их реализовать.

    abstract public function serialize(): string;

    /**
     * @return static
     */
    abstract public static function deserialize(string &$stream): static;
}
