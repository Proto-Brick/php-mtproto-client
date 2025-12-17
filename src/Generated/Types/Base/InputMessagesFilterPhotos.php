<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMessagesFilterPhotos
 */
final class InputMessagesFilterPhotos extends AbstractMessagesFilter
{
    public const CONSTRUCTOR_ID = 0x9609a51c;
    
    public string $predicate = 'inputMessagesFilterPhotos';
    
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