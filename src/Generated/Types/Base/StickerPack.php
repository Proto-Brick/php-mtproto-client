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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);
        $buffer .= Serializer::vectorOfLongs($this->documents);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $emoticon = Deserializer::bytes($stream);
        $documents = Deserializer::vectorOfLongs($stream);
        return new self(
            $emoticon,
            $documents
        );
    }
}