<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contacts.topPeersDisabled
 */
final class TopPeersDisabled extends AbstractTopPeers
{
    public const CONSTRUCTOR_ID = 0xb52c939d;
    
    public string $_ = 'contacts.topPeersDisabled';
    
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.

        return new self();
    }
}