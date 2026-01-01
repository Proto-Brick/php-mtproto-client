<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Auth\Storage;

use ProtoBrick\MTProtoClient\Auth\AuthKey;

/**
 * Интерфейс для хранения и получения ключа авторизации.
 * Поддерживает работу с несколькими дата-центрами (Multi-DC).
 */
interface AuthKeyStorage
{
    /**
     * Возвращает ключ авторизации для указанного DC.
     * Если $dcId null, возвращает основной (Main) ключ.
     */
    public function get(?int $dcId = null): ?AuthKey;

    /**
     * Сохраняет ключ авторизации для указанного DC.
     * Если $dcId null, сохраняет как основной ключ.
     */
    public function set(AuthKey $authKey, ?int $dcId = null): void;
}