<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Contacts\Found;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.search
 */
final class SearchRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x11f812d8;
    
    public string $_ = 'contacts.search';
    
    public function getMethodName(): string
    {
        return 'contacts.search';
    }
    
    public function getResponseClass(): string
    {
        return Found::class;
    }
    /**
     * @param string $q
     * @param int $limit
     */
    public function __construct(
        public readonly string $q,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->q);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}