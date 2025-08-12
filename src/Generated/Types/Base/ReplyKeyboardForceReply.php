<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/replyKeyboardForceReply
 */
final class ReplyKeyboardForceReply extends AbstractReplyMarkup
{
    public const CONSTRUCTOR_ID = 0x86b40b08;
    
    public string $predicate = 'replyKeyboardForceReply';
    
    /**
     * @param true|null $singleUse
     * @param true|null $selective
     * @param string|null $placeholder
     */
    public function __construct(
        public readonly ?true $singleUse = null,
        public readonly ?true $selective = null,
        public readonly ?string $placeholder = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->singleUse) $flags |= (1 << 1);
        if ($this->selective) $flags |= (1 << 2);
        if ($this->placeholder !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->placeholder);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $singleUse = ($flags & (1 << 1)) ? true : null;
        $selective = ($flags & (1 << 2)) ? true : null;
        $placeholder = ($flags & (1 << 3)) ? Deserializer::bytes($stream) : null;

        return new self(
            $singleUse,
            $selective,
            $placeholder
        );
    }
}