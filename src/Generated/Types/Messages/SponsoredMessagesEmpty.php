<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.sponsoredMessagesEmpty
 */
final class SponsoredMessagesEmpty extends AbstractSponsoredMessages
{
    public const CONSTRUCTOR_ID = 0x1839490f;
    
    public string $predicate = 'messages.sponsoredMessagesEmpty';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID

        return new self();
    }
}