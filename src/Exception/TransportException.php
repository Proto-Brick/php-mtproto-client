<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Exception;

/**
 * Выбрасывается при ошибках сетевого уровня (соединение, чтение, запись).
 */
class TransportException extends \Exception {}
