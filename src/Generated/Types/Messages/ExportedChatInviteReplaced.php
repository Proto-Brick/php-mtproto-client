<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractExportedChatInvite as BaseAbstractExportedChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.exportedChatInviteReplaced
 */
final class ExportedChatInviteReplaced extends AbstractExportedChatInvite
{
    public const CONSTRUCTOR_ID = 0x222600ef;
    
    public string $_ = 'messages.exportedChatInviteReplaced';
    
    /**
     * @param BaseAbstractExportedChatInvite $invite
     * @param BaseAbstractExportedChatInvite $newInvite
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly BaseAbstractExportedChatInvite $invite,
        public readonly BaseAbstractExportedChatInvite $newInvite,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invite->serialize($serializer);
        $buffer .= $this->newInvite->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $invite = BaseAbstractExportedChatInvite::deserialize($deserializer, $stream);
        $newInvite = BaseAbstractExportedChatInvite::deserialize($deserializer, $stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $invite,
            $newInvite,
            $users
        );
    }
}