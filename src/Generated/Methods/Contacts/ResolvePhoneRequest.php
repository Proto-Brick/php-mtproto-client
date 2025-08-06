<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Contacts\ResolvedPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.resolvePhone
 */
final class ResolvePhoneRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8af94344;
    
    public string $_ = 'contacts.resolvePhone';
    
    public function getMethodName(): string
    {
        return 'contacts.resolvePhone';
    }
    
    public function getResponseClass(): string
    {
        return ResolvedPeer::class;
    }
    /**
     * @param string $phone
     */
    public function __construct(
        public readonly string $phone
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phone);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}