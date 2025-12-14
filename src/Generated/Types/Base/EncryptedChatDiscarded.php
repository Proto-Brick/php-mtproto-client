<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/encryptedChatDiscarded
 */
final class EncryptedChatDiscarded extends AbstractEncryptedChat implements PeerEntity
{
    public const CONSTRUCTOR_ID = 0x1e1c7c45;
    
    public string $predicate = 'encryptedChatDiscarded';
    
    /**
     * @param int $id
     * @param true|null $historyDeleted
     */
    public function __construct(
        public readonly int $id,
        public readonly ?true $historyDeleted = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->historyDeleted) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $historyDeleted = (($flags & (1 << 0)) !== 0) ? true : null;
        $id = Deserializer::int32($stream);

        return new self(
            $id,
            $historyDeleted
        );
    }
}