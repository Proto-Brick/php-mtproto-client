<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatParticipantCreator
 */
final class ChatParticipantCreator extends AbstractChatParticipant
{
    public const CONSTRUCTOR_ID = 0xe46bcee4;
    
    public string $_ = 'chatParticipantCreator';
    
    /**
     * @param int $userId
     */
    public function __construct(
        public readonly int $userId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        return new self(
            $userId
        );
    }
}