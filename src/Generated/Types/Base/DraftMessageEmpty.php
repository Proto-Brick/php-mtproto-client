<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/draftMessageEmpty
 */
final class DraftMessageEmpty extends AbstractDraftMessage
{
    public const CONSTRUCTOR_ID = 0x1b0c841a;
    
    public string $_ = 'draftMessageEmpty';
    
    /**
     * @param int|null $date
     */
    public function __construct(
        public readonly ?int $date = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->date !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->date);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $date = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        return new self(
            $date
        );
    }
}