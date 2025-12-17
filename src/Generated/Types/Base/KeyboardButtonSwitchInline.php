<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/keyboardButtonSwitchInline
 */
final class KeyboardButtonSwitchInline extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0x93b9fbb5;
    
    public string $predicate = 'keyboardButtonSwitchInline';
    
    /**
     * @param string $text
     * @param string $query
     * @param true|null $samePeer
     * @param list<InlineQueryPeerType>|null $peerTypes
     */
    public function __construct(
        public readonly string $text,
        public readonly string $query,
        public readonly ?true $samePeer = null,
        public readonly ?array $peerTypes = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->samePeer) {
            $flags |= (1 << 0);
        }
        if ($this->peerTypes !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::bytes($this->query);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->peerTypes);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $samePeer = (($flags & (1 << 0)) !== 0) ? true : null;
        $text = Deserializer::bytes($__payload, $__offset);
        $query = Deserializer::bytes($__payload, $__offset);
        $peerTypes = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [InlineQueryPeerType::class, 'deserialize']) : null;

        return new self(
            $text,
            $query,
            $samePeer,
            $peerTypes
        );
    }
}