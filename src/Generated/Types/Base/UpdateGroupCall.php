<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateGroupCall
 */
final class UpdateGroupCall extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x97d64341;
    
    public string $predicate = 'updateGroupCall';
    
    /**
     * @param AbstractGroupCall $call
     * @param int|null $chatId
     */
    public function __construct(
        public readonly AbstractGroupCall $call,
        public readonly ?int $chatId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->chatId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->chatId);
        }
        $buffer .= $this->call->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $chatId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;
        $call = AbstractGroupCall::deserialize($stream);

        return new self(
            $call,
            $chatId
        );
    }
}