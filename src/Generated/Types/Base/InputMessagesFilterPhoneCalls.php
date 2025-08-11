<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMessagesFilterPhoneCalls
 */
final class InputMessagesFilterPhoneCalls extends AbstractMessagesFilter
{
    public const CONSTRUCTOR_ID = 0x80c99768;
    
    public string $_ = 'inputMessagesFilterPhoneCalls';
    
    /**
     * @param bool|null $missed
     */
    public function __construct(
        public readonly ?bool $missed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->missed) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $missed = ($flags & (1 << 0)) ? true : null;
        return new self(
            $missed
        );
    }
}