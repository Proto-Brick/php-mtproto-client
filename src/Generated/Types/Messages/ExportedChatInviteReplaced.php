<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractExportedChatInvite as BaseAbstractExportedChatInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.exportedChatInviteReplaced
 */
final class ExportedChatInviteReplaced extends AbstractExportedChatInvite
{
    public const CONSTRUCTOR_ID = 0x222600ef;
    
    public string $predicate = 'messages.exportedChatInviteReplaced';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invite->serialize();
        $buffer .= $this->newInvite->serialize();
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $invite = BaseAbstractExportedChatInvite::deserialize($__payload, $__offset);
        $newInvite = BaseAbstractExportedChatInvite::deserialize($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $invite,
            $newInvite,
            $users
        );
    }
}