<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaPaidMedia
 */
final class InputMediaPaidMedia extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xc4103386;
    
    public string $_ = 'inputMediaPaidMedia';
    
    /**
     * @param int $starsAmount
     * @param list<AbstractInputMedia> $extendedMedia
     * @param string|null $payload
     */
    public function __construct(
        public readonly int $starsAmount,
        public readonly array $extendedMedia,
        public readonly ?string $payload = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->payload !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->starsAmount);
        $buffer .= Serializer::vectorOfObjects($this->extendedMedia);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->payload);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $starsAmount = Deserializer::int64($stream);
        $extendedMedia = Deserializer::vectorOfObjects($stream, [AbstractInputMedia::class, 'deserialize']);
        $payload = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        return new self(
            $starsAmount,
            $extendedMedia,
            $payload
        );
    }
}