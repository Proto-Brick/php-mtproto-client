<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Auth;

final readonly class AuthKey
{
    public string $id;

    public function __construct(
        public string $key,
    ) {
        $this->id = substr(sha1($this->key, true), -8);
    }
}