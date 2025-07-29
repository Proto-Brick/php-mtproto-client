<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Session;

use DigitalStars\MtprotoClient\Auth\AuthKey;
use DigitalStars\MtprotoClient\Session\Storage\SessionStorage;

class Session
{
    private ?string $id = null;
    private int $sequence = 0;
    private ?string $serverSalt = null;

    public function __construct(private readonly SessionStorage $storage) {}

    public function start(AuthKey $authKey): void
    {
        $data = $this->storage->getFor($authKey->id);
        if ($data) {
            $this->id = $data['id'];
            $this->sequence = $data['sequence'];
            $this->serverSalt = $data['salt'];
        } else {
            $this->id = random_bytes(8);
        }
    }

    public function save(AuthKey $authKey): void
    {
        $this->storage->setFor($authKey->id, [
            'id' => $this->id,
            'sequence' => $this->sequence,
            'salt' => $this->serverSalt,
        ]);
    }

    public function generateMessageId(): string
    {
        if (PHP_INT_SIZE < 8) {
            throw new \RuntimeException("This simple msg_id implementation works only on 64-bit systems.");
        }
        $time = microtime(true);
        $timestamp = (int)$time;

        static $msg_id_counter = 0;
        $msg_id_counter++;

        $msgId = ($timestamp << 32) | ($msg_id_counter << 2);

        return pack('P', $msgId);
    }

    public function generateSequence(bool $isContentRelated): int
    {
        if ($isContentRelated) {
            $seq = $this->sequence * 2 + 1;
            $this->sequence++;
            return $seq;
        }
        return $this->sequence * 2;
    }

    public function getId(): ?string { return $this->id; }
    public function getServerSalt(): ?string { return $this->serverSalt; }
    public function setServerSalt(string $salt): void { $this->serverSalt = $salt; }
}