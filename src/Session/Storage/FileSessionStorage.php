<?php declare(strict_types=1);
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
        if (!file_exists($path)) return null;
        $content = file_get_contents($path);
        return $content ? json_decode($content, true) : null;
    }

    public function setFor(string $authKeyId, array $data): void
    {
        $path = $this->getFilePath($authKeyId);
        file_put_contents($path, json_encode($data));
    }
}