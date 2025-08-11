<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/privacyValueAllowChatParticipants
 */
final class PrivacyValueAllowChatParticipants extends AbstractPrivacyRule
{
    public const CONSTRUCTOR_ID = 0x6b134e8e;
    
    public string $_ = 'privacyValueAllowChatParticipants';
    
    /**
     * @param list<int> $chats
     */
    public function __construct(
        public readonly array $chats
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->chats);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $chats = Deserializer::vectorOfLongs($stream);
        return new self(
            $chats
        );
    }
}