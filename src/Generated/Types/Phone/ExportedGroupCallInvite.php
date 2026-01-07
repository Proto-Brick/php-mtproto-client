<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Phone;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/phone.exportedGroupCallInvite
 */
final class ExportedGroupCallInvite extends TlObject
{
    public const CONSTRUCTOR_ID = 0x204bd158;
    
    public string $predicate = 'phone.exportedGroupCallInvite';
    
    /**
     * @param string $link
     */
    public function __construct(
        public readonly string $link
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->link);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $link = Deserializer::bytes($__payload, $__offset);

        return new self(
            $link
        );
    }
}