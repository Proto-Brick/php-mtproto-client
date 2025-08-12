<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagesFilter;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.searchCounter
 */
final class SearchCounter extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe844ebff;
    
    public string $predicate = 'messages.searchCounter';
    
    /**
     * @param AbstractMessagesFilter $filter
     * @param int $count
     * @param true|null $inexact
     */
    public function __construct(
        public readonly AbstractMessagesFilter $filter,
        public readonly int $count,
        public readonly ?true $inexact = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inexact) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->count);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $inexact = ($flags & (1 << 1)) ? true : null;
        $filter = AbstractMessagesFilter::deserialize($stream);
        $count = Deserializer::int32($stream);

        return new self(
            $filter,
            $count,
            $inexact
        );
    }
}