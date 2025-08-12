<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/notificationSoundRingtone
 */
final class NotificationSoundRingtone extends AbstractNotificationSound
{
    public const CONSTRUCTOR_ID = 0xff6c8049;
    
    public string $predicate = 'notificationSoundRingtone';
    
    /**
     * @param int $id
     */
    public function __construct(
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int64($stream);

        return new self(
            $id
        );
    }
}