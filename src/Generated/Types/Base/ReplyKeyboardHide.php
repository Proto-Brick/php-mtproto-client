<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/replyKeyboardHide
 */
final class ReplyKeyboardHide extends AbstractReplyMarkup
{
    public const CONSTRUCTOR_ID = 2688441221;
    
    public string $_ = 'replyKeyboardHide';
    
    /**
     * @param bool|null $selective
     */
    public function __construct(
        public readonly ?bool $selective = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->selective) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $selective = ($flags & (1 << 2)) ? true : null;
            return new self(
            $selective
        );
    }
}