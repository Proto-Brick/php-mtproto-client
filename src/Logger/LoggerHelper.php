<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Logger;

class LoggerHelper
{
    private const HIDDEN_FIELDS = [
        'phone_code', 'code', 'password', 'new_password', 'current_password',
        'api_hash', 'secret', 'auth_key', 'auth_key_id'
    ];

    public static function sanitize(array $params): array
    {
        $clean = [];
        foreach ($params as $key => $val) {
            if (in_array($key, self::HIDDEN_FIELDS, true)) {
                $clean[$key] = '***HIDDEN***';
            } elseif ($key === 'phone_number' && is_string($val)) {
                $len = strlen($val);
                if ($len > 5) {
                    $clean[$key] = substr($val, 0, 3) . '***' . substr($val, -2);
                } else {
                    $clean[$key] = '***';
                }
            } elseif (is_array($val)) {
                $clean[$key] = self::sanitize($val);
            } else {
                $clean[$key] = $val;
            }
        }
        return $clean;
    }
}