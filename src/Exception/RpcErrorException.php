<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Exception;

/**
 * Выбрасывается, когда сервер возвращает rpc_error.
 */
class RpcErrorException extends \Exception
{
    public function __construct(
        public readonly int $errorCode,
        public readonly string $errorMessage,
    ) {
        parent::__construct(\sprintf('%s (%d)', $errorMessage, $errorCode));
    }
}
