<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaGeo
 */
final class MessageMediaGeo extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x56e0d474;
    
    public string $predicate = 'messageMediaGeo';
    
    /**
     * @param AbstractGeoPoint $geo
     */
    public function __construct(
        public readonly AbstractGeoPoint $geo
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geo->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $geo = AbstractGeoPoint::deserialize($stream);

        return new self(
            $geo
        );
    }
}