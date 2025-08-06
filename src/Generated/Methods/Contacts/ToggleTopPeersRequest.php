<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.toggleTopPeers
 */
final class ToggleTopPeersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8514bdda;
    
    public string $_ = 'contacts.toggleTopPeers';
    
    public function getMethodName(): string
    {
        return 'contacts.toggleTopPeers';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool $enabled
     */
    public function __construct(
        public readonly bool $enabled
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->enabled ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}