<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inlineQueryPeerTypeSameBotPM
 */
final class InlineQueryPeerTypeSameBotPM extends AbstractInlineQueryPeerType
{
    public const CONSTRUCTOR_ID = 0x3081ed9d;
    
    public string $_ = 'inlineQueryPeerTypeSameBotPM';
    
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