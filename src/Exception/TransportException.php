<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Exception;

/**
 * Выбрасывается при ошибках сетевого уровня (соединение, чтение, запись).
 */
class TransportException extends \Exception {}
