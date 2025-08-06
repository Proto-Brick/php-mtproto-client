<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateNewAuthorization
 */
final class UpdateNewAuthorization extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8951abef;
    
    public string $_ = 'updateNewAuthorization';
    
    /**
     * @param int $hash
     * @param bool|null $unconfirmed
     * @param int|null $date
     * @param string|null $device
     * @param string|null $location
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?bool $unconfirmed = null,
        public readonly ?int $date = null,
        public readonly ?string $device = null,
        public readonly ?string $location = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unconfirmed) $flags |= (1 << 0);
        if ($this->date !== null) $flags |= (1 << 0);
        if ($this->device !== null) $flags |= (1 << 0);
        if ($this->location !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->hash);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->date);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->device);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->location);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $unconfirmed = ($flags & (1 << 0)) ? true : null;
        $hash = $deserializer->int64($stream);
        $date = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $device = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $location = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        return new self(
            $hash,
            $unconfirmed,
            $date,
            $device,
            $location
        );
    }
}