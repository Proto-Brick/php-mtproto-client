<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMissingInvitee;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.invitedUsers
 */
final class InvitedUsers extends AbstractInvitedUsers
{
    public const CONSTRUCTOR_ID = 2136862630;
    
    public string $_ = 'messages.invitedUsers';
    
    /**
     * @param AbstractUpdates $updates
     * @param list<AbstractMissingInvitee> $missingInvitees
     */
    public function __construct(
        public readonly AbstractUpdates $updates,
        public readonly array $missingInvitees
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->updates->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->missingInvitees);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $updates = AbstractUpdates::deserialize($deserializer, $stream);
        $missingInvitees = $deserializer->vectorOfObjects($stream, [AbstractMissingInvitee::class, 'deserialize']);
            return new self(
            $updates,
            $missingInvitees
        );
    }
}