<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/mediaAreaUrl
 */
final class MediaAreaUrl extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0x37381085;
    
    public string $predicate = 'mediaAreaUrl';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param string $url
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly string $url
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize();
        $buffer .= Serializer::bytes($this->url);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $url = Deserializer::bytes($stream);

        return new self(
            $coordinates,
            $url
        );
    }
}