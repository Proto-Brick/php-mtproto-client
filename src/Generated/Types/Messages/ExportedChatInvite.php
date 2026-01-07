<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractExportedChatInvite as BaseAbstractExportedChatInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.exportedChatInvite
 */
final class ExportedChatInvite extends AbstractExportedChatInvite
{
    public const CONSTRUCTOR_ID = 0x1871be50;
    
    public string $predicate = 'messages.exportedChatInvite';
    
    /**
     * @param BaseAbstractExportedChatInvite $invite
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly BaseAbstractExportedChatInvite $invite,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invite->serialize();
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $invite = BaseAbstractExportedChatInvite::deserialize($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $invite,
            $users
        );
    }
}