<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Exception;

/**
 * Выбрасывается, когда сервер прислал сервисное сообщение
 * (например, new_session_created или bad_server_salt),
 * которое требует переотправки исходного запроса.
 */
class ResendRequiredException extends \Exception {}
