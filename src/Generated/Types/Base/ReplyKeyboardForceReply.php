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
    
    public string $_ = 'replyKeyboardForceReply';
    
    /**
     * @param bool|null $singleUse
     * @param bool|null $selective
     * @param string|null $placeholder
     */
    public function __construct(
        public readonly ?bool $singleUse = null,
        public readonly ?bool $selective = null,
        public readonly ?string $placeholder = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->singleUse) $flags |= (1 << 1);
        if ($this->selective) $flags |= (1 << 2);
        if ($this->placeholder !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->placeholder);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $singleUse = ($flags & (1 << 1)) ? true : null;
        $selective = ($flags & (1 << 2)) ? true : null;
        $placeholder = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        return new self(
            $singleUse,
            $selective,
            $placeholder
        );
    }
}