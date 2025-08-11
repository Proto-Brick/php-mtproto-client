<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\MissingInvitee;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.invitedUsers
 */
final class InvitedUsers extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7f5defa6;
    
    public string $_ = 'messages.invitedUsers';
    
    /**
     * @param AbstractUpdates $updates
     * @param list<MissingInvitee> $missingInvitees
     */
    public function __construct(
        public readonly AbstractUpdates $updates,
        public readonly array $missingInvitees
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->updates->serialize();
        $buffer .= Serializer::vectorOfObjects($this->missingInvitees);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $updates = AbstractUpdates::deserialize($stream);
        $missingInvitees = Deserializer::vectorOfObjects($stream, [MissingInvitee::class, 'deserialize']);
        return new self(
            $updates,
            $missingInvitees
        );
    }
}