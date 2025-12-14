<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\Contracts;

/**
 * Маркерный интерфейс для TL-объектов, представляющих собой
 * кэшируемые сущности (User, Chat, Channel).
 */
interface PeerEntity
{
    /**
     * Возвращает тип сущности: 'user', 'chat' или 'channel'.
     * Используется для быстрого сохранения в PeerStorage без рефлексии.
     */
    public function getPeerType(): string;
}