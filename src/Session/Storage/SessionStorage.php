<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Session\Storage;

interface SessionStorage
{
    public function getFor(string $authKeyId): ?array;
    public function setFor(string $authKeyId, array $data): void;
}
