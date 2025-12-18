<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Peer\Storage;

use ProtoBrick\MTProtoClient\Peer\PeerInfo;
use Revolt\EventLoop;

class FilePeerStorage implements PeerStorage
{
    /** @var array<int, PeerInfo> */
    private array $cacheById = [];

    /** @var array<string, int> Ключи в нижнем регистре */
    private array $usernameMap = [];

    /** @var array<string, int> Очищенные телефоны */
    private array $phoneMap = [];

    private bool $isDirty = false;
    private string $saveTimerId = '';
    private const SAVE_DELAY = 2.0;

    public function __construct(private readonly string $storageFile)
    {
        $this->load();
    }

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
        if (!$content) {
            return;
        }

        $data = [];

        if (function_exists('igbinary_unserialize')) {
            // igbinary data (usually starts with non-printable chars) or just try unserialize
            $unserialized = @igbinary_unserialize($content);
            if ($unserialized !== null && $unserialized !== false) {
                $data = $unserialized;
            }
        }

        if (empty($data)) {
            $data = json_decode($content, true);
        }

        if (!is_array($data)) {
            return;
        }

        foreach ($data as $row) {
            $peer = new PeerInfo(
                (int)$row['id'],
                (int)$row['access_hash'],
                $row['type'],
                $row['username'] ?? null,
                $row['phone'] ?? null,
                $row['is_min'] ?? false
            );
            $this->updateMemoryCache($peer);
        }
    }

    public function save(PeerInfo $info): void
    {
        $existing = $this->cacheById[$info->id] ?? null;

        // SMART MERGE
        if ($existing) {
            $finalAccessHash = $info->accessHash;

            // Если новый хеш пустой (0), оставляем старый
            if ($finalAccessHash === 0 && $existing->accessHash !== 0) {
                $finalAccessHash = $existing->accessHash;
            }

            // Если пришел min-объект, но у нас уже есть полноценный с валидным хешем,
            // мы доверяем старому хешу, даже если в min-объекте пришел какой-то хеш (обычно там урезанный)
            if ($info->isMin && !$existing->isMin && $existing->accessHash !== 0) {
                $finalAccessHash = $existing->accessHash;
            }

            // Если в новом объекте (особенно min) нет username/phone, оставляем старые
            // Если объект НЕ min и username пришел null, значит юзер его удалил.
            // Но в min-объектах поля часто отсутствуют просто так.

            $finalUsername = $info->username;
            if ($info->isMin && $finalUsername === null) {
                $finalUsername = $existing->username;
            }

            $finalPhone = $info->phone;
            if ($info->isMin && $finalPhone === null) {
                $finalPhone = $existing->phone;
            }

            // isMin ставим false, если хотя бы одна из версий была полноценной
            $finalIsMin = $info->isMin && $existing->isMin;

            $info = new PeerInfo(
                $info->id,
                $finalAccessHash,
                $info->type,
                $finalUsername,
                $finalPhone,
                $finalIsMin
            );
        }

        // COLLISION HANDLING

        // Username Claim (Кто-то занял юзернейм)
        if ($info->username) {
            $normalizedUsername = strtolower($info->username);
            $oldOwnerId = $this->usernameMap[$normalizedUsername] ?? null;

            // Если этот юзернейм принадлежал кому-то другому
            if ($oldOwnerId !== null && $oldOwnerId !== $info->id) {
                $this->removeUsernameFromPeer($oldOwnerId);
            }
        }

        // Username Change (Этот пир сменил юзернейм)
        // Только для полных объектов, т.к. в min юзернейма может просто не быть
        if ($existing && !$info->isMin) {
            // Если был старый юзернейм, и он отличается от нового (или стал null)
            if ($existing->username && $existing->username !== $info->username) {
                unset($this->usernameMap[strtolower($existing->username)]);
            }
        }

        $this->updateMemoryCache($info);

        $this->isDirty = true;
        $this->scheduleSave();
    }

    /**
     * Удаляет username у пира по ID (используется при коллизиях).
     */
    private function removeUsernameFromPeer(int $peerId): void
    {
        $peer = $this->cacheById[$peerId] ?? null;
        if (!$peer || !$peer->username) {
            return;
        }

        unset($this->usernameMap[strtolower($peer->username)]);

        $updatedPeer = new PeerInfo(
            id: $peer->id,
            accessHash: $peer->accessHash,
            type: $peer->type,
            username: null,
            phone: $peer->phone,
            isMin: $peer->isMin
        );
        $this->cacheById[$peerId] = $updatedPeer;
        $this->isDirty = true;
    }

    private function scheduleSave(): void
    {
        if ($this->saveTimerId !== '') {
            return;
        }

        $this->saveTimerId = EventLoop::delay(self::SAVE_DELAY, function () {
            $this->saveTimerId = '';
            if ($this->isDirty) {
                $this->saveToDisk();
                $this->isDirty = false;
            }
        });
    }

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
            $row = [
                'id' => $peer->id,
                'access_hash' => $peer->accessHash,
                'type' => $peer->type,
            ];
            if ($peer->username) {
                $row['username'] = $peer->username;
            }
            if ($peer->phone) {
                $row['phone'] = $peer->phone;
            }
            if ($peer->isMin) {
                $row['is_min'] = true;
            }

            $data[] = $row;
        }

        $tempFile = $this->storageFile . '.tmp';

        if (function_exists('igbinary_serialize')) {
            $content = igbinary_serialize($data);
        } else {
            $content = json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        file_put_contents($tempFile, $content);

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