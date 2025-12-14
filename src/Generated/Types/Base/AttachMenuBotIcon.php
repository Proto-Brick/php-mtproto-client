<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/attachMenuBotIcon
 */
final class AttachMenuBotIcon extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb2a7386b;
    
    public string $predicate = 'attachMenuBotIcon';
    
    /**
     * @param string $name
     * @param AbstractDocument $icon
     * @param list<AttachMenuBotIconColor>|null $colors
     */
    public function __construct(
        public readonly string $name,
        public readonly AbstractDocument $icon,
        public readonly ?array $colors = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->colors !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= $this->icon->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->colors);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $name = Deserializer::bytes($stream);
        $icon = AbstractDocument::deserialize($stream);
        $colors = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($stream, [AttachMenuBotIconColor::class, 'deserialize']) : null;

        return new self(
            $name,
            $icon,
            $colors
        );
    }
}