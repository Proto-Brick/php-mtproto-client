<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Contacts\AbstractBlocked;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.getBlocked
 */
final class GetBlockedRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9a868f80;
    
    public string $predicate = 'contacts.getBlocked';
    
    public function getMethodName(): string
    {
        return 'contacts.getBlocked';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBlocked::class;
    }
    /**
     * @param int $offset
     * @param int $limit
     * @param true|null $myStoriesFrom
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $limit,
        public readonly ?true $myStoriesFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->myStoriesFrom) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}