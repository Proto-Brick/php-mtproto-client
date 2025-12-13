<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Peer\Storage;

use ProtoBrick\MTProtoClient\Peer\PeerInfo;

interface PeerStorage
{
    public function save(PeerInfo $info): void;
    public function getById(int $id): ?PeerInfo;
    public function getByUsername(string $username): ?PeerInfo;
    public function getByPhone(string $phone): ?PeerInfo;
}