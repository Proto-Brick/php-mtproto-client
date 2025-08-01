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
    public const CONSTRUCTOR_ID = 2198575844;
    
    public string $_ = 'notificationSoundLocal';
    
    /**
     * @param string $title
     * @param string $data
     */
    public function __construct(
        public readonly string $title,
        public readonly string $data
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->data);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $title = $deserializer->bytes($stream);
        $data = $deserializer->bytes($stream);
            return new self(
            $title,
            $data
        );
    }
}