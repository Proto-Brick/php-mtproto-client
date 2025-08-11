<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/notificationSoundLocal
 */
final class NotificationSoundLocal extends AbstractNotificationSound
{
    public const CONSTRUCTOR_ID = 0x830b9ae4;
    
    public string $_ = 'notificationSoundLocal';
    
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $title = Deserializer::bytes($stream);
        $data = Deserializer::bytes($stream);
        return new self(
            $title,
            $data
        );
    }
}