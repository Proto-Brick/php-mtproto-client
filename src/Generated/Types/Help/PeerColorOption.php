<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.peerColorOption
 */
final class PeerColorOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0xadec6ebe;
    
    public string $predicate = 'help.peerColorOption';
    
    /**
     * @param int $colorId
     * @param true|null $hidden
     * @param AbstractPeerColorSet|null $colors
     * @param AbstractPeerColorSet|null $darkColors
     * @param int|null $channelMinLevel
     * @param int|null $groupMinLevel
     */
    public function __construct(
        public readonly int $colorId,
        public readonly ?true $hidden = null,
        public readonly ?AbstractPeerColorSet $colors = null,
        public readonly ?AbstractPeerColorSet $darkColors = null,
        public readonly ?int $channelMinLevel = null,
        public readonly ?int $groupMinLevel = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hidden) $flags |= (1 << 0);
        if ($this->colors !== null) $flags |= (1 << 1);
        if ($this->darkColors !== null) $flags |= (1 << 2);
        if ($this->channelMinLevel !== null) $flags |= (1 << 3);
        if ($this->groupMinLevel !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->colorId);
        if ($flags & (1 << 1)) {
            $buffer .= $this->colors->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->darkColors->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->channelMinLevel);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->groupMinLevel);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $hidden = ($flags & (1 << 0)) ? true : null;
        $colorId = Deserializer::int32($stream);
        $colors = ($flags & (1 << 1)) ? AbstractPeerColorSet::deserialize($stream) : null;
        $darkColors = ($flags & (1 << 2)) ? AbstractPeerColorSet::deserialize($stream) : null;
        $channelMinLevel = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $groupMinLevel = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;

        return new self(
            $colorId,
            $hidden,
            $colors,
            $darkColors,
            $channelMinLevel,
            $groupMinLevel
        );
    }
}