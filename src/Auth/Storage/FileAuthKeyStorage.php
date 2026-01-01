<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Auth\Storage;

use ProtoBrick\MTProtoClient\Auth\AuthKey;

readonly class FileAuthKeyStorage implements AuthKeyStorage
{
    /**
     * @param string $storagePath Базовый путь к файлу основного ключа (например, './session/auth.key')
     */
    public function __construct(private string $storagePath) {}

    public function get(?int $dcId = null): ?AuthKey
    {
        $path = $this->getFilePath($dcId);

        if (!file_exists($path)) {
            return null;
        }

        $key = file_get_contents($path);
        // Проверка на пустой файл
        if ($key === false || strlen($key) !== 256) {
            return null;
        }

        return new AuthKey($key);
    }

    public function set(AuthKey $authKey, ?int $dcId = null): void
    {
        $path = $this->getFilePath($dcId);

        // Убедимся, что директория существует (если путь сложный)
        $dir = dirname($path);
        if (!is_dir($dir)) {
            if (!mkdir($dir, 0777, true) && !is_dir($dir)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $dir));
            }
        }

        file_put_contents($path, $authKey->key);
    }

    /**
     * Генерирует путь к файлу ключа.
     * Если dcId не задан, возвращает дефолтный путь (обратная совместимость).
     * Если задан, делает suffix (auth_dc2.key).
     */
    private function getFilePath(?int $dcId): string
    {
        if ($dcId === null) {
            return $this->storagePath;
        }

        // Превращаем /path/to/auth.key в /path/to/auth_dc2.key
        $info = pathinfo($this->storagePath);
        $dir = $info['dirname'];
        $filename = $info['filename']; // 'auth'
        $ext = isset($info['extension']) ? '.' . $info['extension'] : ''; // '.key'

        return $dir . DIRECTORY_SEPARATOR . $filename . '_dc' . $dcId . $ext;
    }
}