<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.messageEditData
 */
final class MessageEditData extends AbstractMessageEditData
{
    public const CONSTRUCTOR_ID = 649453030;
    
    public string $_ = 'messages.messageEditData';
    
    /**
     * @param bool|null $caption
     */
    public function __construct(
        public readonly ?bool $caption = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->caption) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $caption = ($flags & (1 << 0)) ? true : null;
            return new self(
            $caption
        );
    }
}