<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/keyboardButtonRequestPoll
 */
final class KeyboardButtonRequestPoll extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xbbc7515d;
    
    public string $predicate = 'keyboardButtonRequestPoll';
    
    /**
     * @param string $text
     * @param bool|null $quiz
     */
    public function __construct(
        public readonly string $text,
        public readonly ?bool $quiz = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->quiz !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->quiz ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $quiz = (($flags & (1 << 0)) !== 0) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $text = Deserializer::bytes($stream);

        return new self(
            $text,
            $quiz
        );
    }
}