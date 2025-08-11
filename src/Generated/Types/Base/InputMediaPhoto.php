<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaPhoto
 */
final class InputMediaPhoto extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xb3ba0635;
    
    public string $_ = 'inputMediaPhoto';
    
    /**
     * @param AbstractInputPhoto $id
     * @param bool|null $spoiler
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly AbstractInputPhoto $id,
        public readonly ?bool $spoiler = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) $flags |= (1 << 1);
        if ($this->ttlSeconds !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->id->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $spoiler = ($flags & (1 << 1)) ? true : null;
        $id = AbstractInputPhoto::deserialize($stream);
        $ttlSeconds = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        return new self(
            $id,
            $spoiler,
            $ttlSeconds
        );
    }
}