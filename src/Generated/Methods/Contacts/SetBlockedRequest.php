<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.setBlocked
 */
final class SetBlockedRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x94c65c76;
    
    public string $_ = 'contacts.setBlocked';
    
    public function getMethodName(): string
    {
        return 'contacts.setBlocked';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<AbstractInputPeer> $id
     * @param int $limit
     * @param bool|null $myStoriesFrom
     */
    public function __construct(
        public readonly array $id,
        public readonly int $limit,
        public readonly ?bool $myStoriesFrom = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->myStoriesFrom) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->id);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}