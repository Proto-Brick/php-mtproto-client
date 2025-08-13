<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Contacts\AbstractSponsoredPeers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.getSponsoredPeers
 */
final class GetSponsoredPeersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb6c8c393;
    
    public string $predicate = 'contacts.getSponsoredPeers';
    
    public function getMethodName(): string
    {
        return 'contacts.getSponsoredPeers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSponsoredPeers::class;
    }
    /**
     * @param string $q
     */
    public function __construct(
        public readonly string $q
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->q);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}