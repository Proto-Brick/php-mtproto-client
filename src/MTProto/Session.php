<?php

namespace DigitalStars\MtprotoClient\MTProto;

class Session {
    private string $sessionFile = 'session.json';
    private array $data = [];

    public function exists(): bool {
        return file_exists($this->sessionFile);
    }

    public function save(array $data): void {
        $this->data = $data;
        file_put_contents($this->sessionFile, json_encode($data));
    }

    public function load(): array {
        if (!$this->exists()) {
            throw new \Exception('Session file not found');
        }
        $this->data = json_decode(file_get_contents($this->sessionFile), true);
        return $this->data;
    }

    public function getPhoneCodeHash(): ?string {
        return $this->data['phone_code_hash'] ?? null;
    }
}