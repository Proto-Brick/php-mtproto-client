<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/attachMenuBotIconColor
 */
final class AttachMenuBotIconColor extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4576f3f0;
    
    public string $predicate = 'attachMenuBotIconColor';
    
    /**
     * @param string $name
     * @param int $color
     */
    public function __construct(
        public readonly string $name,
        public readonly int $color
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= Serializer::int32($this->color);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $name = Deserializer::bytes($stream);
        $color = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $name,
            $color
        );
    }
}