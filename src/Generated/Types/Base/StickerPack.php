<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerPack
 */
final class StickerPack extends TlObject
{
    public const CONSTRUCTOR_ID = 0x12b299d4;
    
    public string $_ = 'stickerPack';
    
    /**
     * @param string $emoticon
     * @param list<int> $documents
     */
    public function __construct(
        public readonly string $emoticon,
        public readonly array $documents
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->emoticon);
        $buffer .= $serializer->vectorOfLongs($this->documents);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $emoticon = $deserializer->bytes($stream);
        $documents = $deserializer->vectorOfLongs($stream);
        return new self(
            $emoticon,
            $documents
        );
    }
}