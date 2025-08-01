<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Auth;

final readonly class AuthKey
{
    public string $id;

    public function __construct(
        public string $key,
    ) {
        if (\strlen($this->key) !== 256) {
            // Добавим проверку, чтобы убедиться, что ключ правильной длины
            throw new \InvalidArgumentException("AuthKey must be 256 bytes long.");
        }

        $hash = sha1($key, true);
        $this->id = substr($hash, -8);
    }
}
