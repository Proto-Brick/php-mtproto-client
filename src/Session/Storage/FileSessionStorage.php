<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Session\Storage;

class FileSessionStorage implements SessionStorage
{
    public function __construct(private readonly string $storageDir) {}

    private function getFilePath(string $authKeyId): string
    {
        return rtrim($this->storageDir, '/') . '/' . bin2hex($authKeyId) . '.session';
    }

    public function getFor(string $authKeyId): ?array
    {
        $path = $this->getFilePath($authKeyId);
        if (!file_exists($path)) {
            return null;
        }

        $content = file_get_contents($path);
        if (!$content) {
            return null;
        }

        $data = json_decode($content, true);
        if (!$data) {
            return null;
        }

        // Декодируем бинарные данные из hex
        if (isset($data['id'])) {
            $data['id'] = hex2bin($data['id']);
        }

        return $data;
    }

    public function setFor(string $authKeyId, array $data): void
    {
        $path = $this->getFilePath($authKeyId);
        if (isset($data['id']) && \is_string($data['id'])) {
            $data['id'] = bin2hex($data['id']);
        }

        file_put_contents($path, json_encode($data));
    }
}
