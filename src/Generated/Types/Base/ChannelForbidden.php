<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelForbidden
 */
final class ChannelForbidden extends AbstractChat
{
    public const CONSTRUCTOR_ID = 0x17d493d5;
    
    public string $_ = 'channelForbidden';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $title
     * @param bool|null $broadcast
     * @param bool|null $megagroup
     * @param int|null $untilDate
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $title,
        public readonly ?bool $broadcast = null,
        public readonly ?bool $megagroup = null,
        public readonly ?int $untilDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcast) $flags |= (1 << 5);
        if ($this->megagroup) $flags |= (1 << 8);
        if ($this->untilDate !== null) $flags |= (1 << 16);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::int32($this->untilDate);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $broadcast = ($flags & (1 << 5)) ? true : null;
        $megagroup = ($flags & (1 << 8)) ? true : null;
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $title = Deserializer::bytes($stream);
        $untilDate = ($flags & (1 << 16)) ? Deserializer::int32($stream) : null;
        return new self(
            $id,
            $accessHash,
            $title,
            $broadcast,
            $megagroup,
            $untilDate
        );
    }
}