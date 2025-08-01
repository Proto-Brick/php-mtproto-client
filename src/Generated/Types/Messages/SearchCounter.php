<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagesFilter;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.searchCounter
 */
final class SearchCounter extends AbstractSearchCounter
{
    public const CONSTRUCTOR_ID = 3896830975;
    
    public string $_ = 'messages.searchCounter';
    
    /**
     * @param AbstractMessagesFilter $filter
     * @param int $count
     * @param bool|null $inexact
     */
    public function __construct(
        public readonly AbstractMessagesFilter $filter,
        public readonly int $count,
        public readonly ?bool $inexact = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inexact) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->filter->serialize($serializer);
        $buffer .= $serializer->int32($this->count);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $inexact = ($flags & (1 << 1)) ? true : null;
        $filter = AbstractMessagesFilter::deserialize($deserializer, $stream);
        $count = $deserializer->int32($stream);
            return new self(
            $filter,
            $count,
            $inexact
        );
    }
}