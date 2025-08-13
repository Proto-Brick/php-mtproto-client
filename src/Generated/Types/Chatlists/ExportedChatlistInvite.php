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
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $filter = AbstractDialogFilter::deserialize($stream);
        $invite = BaseExportedChatlistInvite::deserialize($stream);

        return new self(
            $filter,
            $invite
        );
    }
}