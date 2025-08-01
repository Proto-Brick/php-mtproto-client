<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateEditMessage
 */
final class UpdateEditMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 3825430691;
    
    public string $_ = 'updateEditMessage';
    
    /**
     * @param AbstractMessage $message
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly AbstractMessage $message,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->message->serialize($serializer);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $message = AbstractMessage::deserialize($deserializer, $stream);
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
            return new self(
            $message,
            $pts,
            $ptsCount
        );
    }
}