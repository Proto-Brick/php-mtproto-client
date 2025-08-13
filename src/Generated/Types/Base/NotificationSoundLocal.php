<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/notificationSoundLocal
 */
final class NotificationSoundLocal extends AbstractNotificationSound
{
    public const CONSTRUCTOR_ID = 0x830b9ae4;
    
    public string $predicate = 'notificationSoundLocal';
    
    /**
     * @param string $title
     * @param string $data
     */
    public function __construct(
        public readonly string $title,
        public readonly string $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $title = Deserializer::bytes($stream);
        $data = Deserializer::bytes($stream);

        return new self(
            $title,
            $data
        );
    }
}