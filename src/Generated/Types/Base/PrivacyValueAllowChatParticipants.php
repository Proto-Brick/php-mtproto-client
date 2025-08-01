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
    public const CONSTRUCTOR_ID = 1796427406;
    
    public string $_ = 'privacyValueAllowChatParticipants';
    
    /**
     * @param list<int> $chats
     */
    public function __construct(
        public readonly array $chats
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfLongs($this->chats);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chats = $deserializer->vectorOfLongs($stream);
            return new self(
            $chats
        );
    }
}