<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/keyboardButtonCallback
 */
final class KeyboardButtonCallback extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0x35bbdb6b;
    
    public string $predicate = 'keyboardButtonCallback';
    
    /**
     * @param string $text
     * @param string $data
     * @param true|null $requiresPassword
     */
    public function __construct(
        public readonly string $text,
        public readonly string $data,
        public readonly ?true $requiresPassword = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requiresPassword) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $requiresPassword = (($flags & (1 << 0)) !== 0) ? true : null;
        $text = Deserializer::bytes($stream);
        $data = Deserializer::bytes($stream);

        return new self(
            $text,
            $data,
            $requiresPassword
        );
    }
}