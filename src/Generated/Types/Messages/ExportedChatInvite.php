<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractExportedChatInvite as BaseAbstractExportedChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.exportedChatInvite
 */
final class ExportedChatInvite extends AbstractExportedChatInvite
{
    public const CONSTRUCTOR_ID = 0x1871be50;
    
    public string $_ = 'messages.exportedChatInvite';
    
    /**
     * @param BaseAbstractExportedChatInvite $invite
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly BaseAbstractExportedChatInvite $invite,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invite->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $invite = BaseAbstractExportedChatInvite::deserialize($deserializer, $stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $invite,
            $users
        );
    }
}