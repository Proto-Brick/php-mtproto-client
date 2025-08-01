<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPeerChannel
 */
final class InputPeerChannel extends AbstractInputPeer
{
    public const CONSTRUCTOR_ID = 666680316;
    
    public string $_ = 'inputPeerChannel';
    
    /**
     * @param int $channelId
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $accessHash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->channelId);
        $buffer .= $serializer->int64($this->accessHash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channelId = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
            return new self(
            $channelId,
            $accessHash
        );
    }
}