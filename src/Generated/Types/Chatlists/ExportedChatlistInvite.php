<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDialogFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ExportedChatlistInvite as BaseExportedChatlistInvite;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/chatlists.exportedChatlistInvite
 */
final class ExportedChatlistInvite extends TlObject
{
    public const CONSTRUCTOR_ID = 0x10e6e3a6;
    
    public string $predicate = 'chatlists.exportedChatlistInvite';
    
    /**
     * @param AbstractDialogFilter $filter
     * @param BaseExportedChatlistInvite $invite
     */
    public function __construct(
        public readonly AbstractDialogFilter $filter,
        public readonly BaseExportedChatlistInvite $invite
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->filter->serialize();
        $buffer .= $this->invite->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $filter = AbstractDialogFilter::deserialize($__payload, $__offset);
        $invite = BaseExportedChatlistInvite::deserialize($__payload, $__offset);

        return new self(
            $filter,
            $invite
        );
    }
}