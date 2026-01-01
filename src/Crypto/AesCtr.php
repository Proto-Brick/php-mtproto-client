<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

use phpseclib3\Crypt\AES;

class AesCtr
{
    private AES $engine;

    public function __construct(string $key, string $iv)
    {
        $this->engine = new AES('ctr');
        $this->engine->setKey($key);
        $this->engine->setIV($iv);
        $this->engine->enableContinuousBuffer();
        $this->engine->disablePadding();
    }

    public function encrypt(string $data): string
    {
        return $this->engine->encrypt($data);
    }

    public function decrypt(string $data): string
    {
        return $this->engine->decrypt($data);
    }
}