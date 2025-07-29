<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Generated\Mtproto;

use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/constructor/resPQ
 */
final class ResPQ extends TlObject
{
    public const CONSTRUCTOR_ID = 0x05162463;

    public function __construct(
        public readonly string $nonce, // int128, но храним как бинарную строку
        public readonly string $server_nonce, // int128
        public readonly string $pq, // bytes
        public readonly array $server_public_key_fingerprints // Vector<long>
    ) {}

    /**
     * Десериализует объект из потока данных.
     */
    public static function fromStream(string &$stream): self
    {
        // TODO: Здесь будет логика, которая использует Deserializer
        // для последовательного чтения полей из $stream.
        // Например:
        // $deserializer = new Deserializer();
        // $nonce = $deserializer->int128($stream);
        // ...
        // return new self($nonce, ...);

        // Временная заглушка
        return new self('', '', '', []);
    }
}