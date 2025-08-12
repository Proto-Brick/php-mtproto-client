<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateNewChannelMessage
 */
final class UpdateNewChannelMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x62ba04d9;
    
    public string $predicate = 'updateNewChannelMessage';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->message->serialize();
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $message = AbstractMessage::deserialize($stream);
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);

        return new self(
            $message,
            $pts,
            $ptsCount
        );
    }
}