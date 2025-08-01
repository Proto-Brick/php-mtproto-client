<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/labeledPrice
 */
final class LabeledPrice extends AbstractLabeledPrice
{
    public const CONSTRUCTOR_ID = 3408489464;
    
    public string $_ = 'labeledPrice';
    
    /**
     * @param string $label
     * @param int $amount
     */
    public function __construct(
        public readonly string $label,
        public readonly int $amount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->label);
        $buffer .= $serializer->int64($this->amount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $label = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
            return new self(
            $label,
            $amount
        );
    }
}