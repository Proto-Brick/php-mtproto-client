<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Auth\Storage;
use DigitalStars\MtprotoClient\Auth\AuthKey;

class FileAuthKeyStorage implements AuthKeyStorage
{
    public function __construct(private readonly string $storagePath) {}

    public function get(): ?AuthKey
    {
        if (!file_exists($this->storagePath)) {
            return null;
        }
        $key = file_get_contents($this->storagePath);
        return $key ? new AuthKey($key) : null;
    }

    public function set(AuthKey $authKey): void
    {
        file_put_contents($this->storagePath, $authKey->key);
    }
}