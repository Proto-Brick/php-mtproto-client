<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChatParticipants
 */
final class UpdateChatParticipants extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7761198;
    
    public string $_ = 'updateChatParticipants';
    
    /**
     * @param AbstractChatParticipants $participants
     */
    public function __construct(
        public readonly AbstractChatParticipants $participants
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->participants->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $participants = AbstractChatParticipants::deserialize($stream);
        return new self(
            $participants
        );
    }
}