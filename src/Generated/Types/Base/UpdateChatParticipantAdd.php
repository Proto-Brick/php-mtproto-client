<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChatParticipantAdd
 */
final class UpdateChatParticipantAdd extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x3dda5451;
    
    public string $_ = 'updateChatParticipantAdd';
    
    /**
     * @param int $chatId
     * @param int $userId
     * @param int $inviterId
     * @param int $date
     * @param int $version
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $userId,
        public readonly int $inviterId,
        public readonly int $date,
        public readonly int $version
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int64($this->inviterId);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->version);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chatId = $deserializer->int64($stream);
        $userId = $deserializer->int64($stream);
        $inviterId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $version = $deserializer->int32($stream);
        return new self(
            $chatId,
            $userId,
            $inviterId,
            $date,
            $version
        );
    }
}