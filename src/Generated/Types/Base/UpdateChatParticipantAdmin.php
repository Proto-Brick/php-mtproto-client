<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChatParticipantAdmin
 */
final class UpdateChatParticipantAdmin extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd7ca61a2;
    
    public string $_ = 'updateChatParticipantAdmin';
    
    /**
     * @param int $chatId
     * @param int $userId
     * @param bool $isAdmin
     * @param int $version
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $userId,
        public readonly bool $isAdmin,
        public readonly int $version
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= ($this->isAdmin ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        $buffer .= $serializer->int32($this->version);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chatId = $deserializer->int64($stream);
        $userId = $deserializer->int64($stream);
        $isAdmin = ($deserializer->int32($stream) === 0x997275b5);
        $version = $deserializer->int32($stream);
        return new self(
            $chatId,
            $userId,
            $isAdmin,
            $version
        );
    }
}