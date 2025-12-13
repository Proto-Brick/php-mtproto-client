<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Peer\Storage;

use ProtoBrick\MTProtoClient\Peer\PeerInfo;
use Revolt\EventLoop;

class FilePeerStorage implements PeerStorage
{
    /** @var array<int, PeerInfo> */
    private array $cacheById = [];

    /** @var array<string, int> */
    private array $usernameMap = [];

    /** @var array<string, int> */
    private array $phoneMap = [];

    /** @var bool Флаг: были ли изменения с момента последней записи */
    private bool $isDirty = false;

    /** @var string ID активного таймера Revolt */
    private string $saveTimerId = '';

    /** @var float Задержка записи на диск в секундах */
    private const SAVE_DELAY = 2.0;

    public function __construct(private readonly string $storageFile)
    {
        $this->load();
    }

    /**
     * Гарантирует сохранение данных при уничтожении объекта (завершении скрипта).
     */
    public function __destruct()
    {
        $this->flush();
    }

    private function load(): void
    {
        if (!file_exists($this->storageFile)) {
            return;
        }

        $content = file_get_contents($this->storageFile);
        if (!$content) return;

        $data = json_decode($content, true) ?: [];

        foreach ($data as $row) {
            $peer = new PeerInfo(
                (int)$row['id'],
                (int)$row['access_hash'],
                $row['type'],
                $row['username'] ?? null,
                $row['phone'] ?? null
            );
            $this->updateMemoryCache($peer);
        }
    }

    public function save(PeerInfo $info): void
    {
        $existing = $this->cacheById[$info->id] ?? null;

        // --- ЛОГИКА СЛИЯНИЯ (SMART MERGE) ---
        if ($existing) {
            $newAccessHash = $info->accessHash;
            $newUsername = $info->username;
            $newPhone = $info->phone;

            // 1. Не затираем валидный хеш нулем
            if ($newAccessHash === 0 && $existing->accessHash !== 0) {
                $newAccessHash = $existing->accessHash;
            }

            // 2. Не теряем юзернейм
            if ($newUsername === null && $existing->username !== null) {
                $newUsername = $existing->username;
            }

            // 3. Не теряем телефон
            if ($newPhone === null && $existing->phone !== null) {
                $newPhone = $existing->phone;
            }

            $info = new PeerInfo(
                $info->id,
                $newAccessHash,
                $info->type,
                $newUsername,
                $newPhone
            );
        }
        // ------------------------------------

        $this->updateMemoryCache($info);

        // ВМЕСТО МГНОВЕННОЙ ЗАПИСИ:
        $this->isDirty = true;
        $this->scheduleSave();
    }

    /**
     * Планирует запись на диск через SAVE_DELAY секунд.
     * Если таймер уже запущен, новый не создается.
     */
    private function scheduleSave(): void
    {
        if ($this->saveTimerId !== '') {
            return;
        }

        $this->saveTimerId = EventLoop::delay(self::SAVE_DELAY, function () {
            $this->saveTimerId = ''; // Сбрасываем ID, так как таймер сработал
            if ($this->isDirty) {
                $this->saveToDisk();
                $this->isDirty = false;
                echo "[Storage] Peers saved to disk (Throttled).\n"; // Раскомментировать для отладки
            }
        });
    }

    /**
     * Принудительно записывает изменения на диск, если они есть.
     * Отменяет отложенный таймер.
     */
    public function flush(): void
    {
        if ($this->saveTimerId !== '') {
            EventLoop::cancel($this->saveTimerId);
            $this->saveTimerId = '';
        }

        if ($this->isDirty) {
            $this->saveToDisk();
            $this->isDirty = false;
        }
    }

    private function updateMemoryCache(PeerInfo $info): void
    {
        $this->cacheById[$info->id] = $info;

        if ($info->username) {
            $this->usernameMap[strtolower($info->username)] = $info->id;
        }

        if ($info->phone) {
            $this->phoneMap[$info->phone] = $info->id;
        }
    }

    private function saveToDisk(): void
    {
        $data = [];
        foreach ($this->cacheById as $peer) {
            $data[] = [
                'id' => $peer->id,
                'access_hash' => $peer->accessHash,
                'type' => $peer->type,
                'username' => $peer->username,
                'phone' => $peer->phone,
            ];
        }

        // Атомарная запись для предотвращения повреждения файла при сбоях
        $tempFile = $this->storageFile . '.tmp';
        file_put_contents($tempFile, json_encode($data, JSON_UNESCAPED_UNICODE));

        if (file_exists($tempFile)) {
            rename($tempFile, $this->storageFile);
        }
    }

    public function getById(int $id): ?PeerInfo
    {
        return $this->cacheById[$id] ?? null;
    }

    public function getByUsername(string $username): ?PeerInfo
    {
        $id = $this->usernameMap[strtolower($username)] ?? null;
        return $id ? $this->getById($id) : null;
    }

    public function getByPhone(string $phone): ?PeerInfo
    {
        $id = $this->phoneMap[$phone] ?? null;
        return $id ? $this->getById($id) : null;
    }
}