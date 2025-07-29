<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Auth\Storage;

use DigitalStars\MtprotoClient\Auth\AuthKey;

/**
 * Интерфейс для хранения и получения ключа авторизации.
 * Соответствует принципам: Low Coupling, DI-ready.
 */
interface AuthKeyStorage
{
    public function get(): ?AuthKey;
    public function set(AuthKey $authKey): void;
}