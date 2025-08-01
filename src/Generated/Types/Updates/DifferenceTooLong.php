<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updates.differenceTooLong
 */
final class DifferenceTooLong extends AbstractDifference
{
    public const CONSTRUCTOR_ID = 1258196845;
    
    public string $_ = 'updates.differenceTooLong';
    
    /**
     * @param int $pts
     */
    public function __construct(
        public readonly int $pts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->pts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $pts = $deserializer->int32($stream);
            return new self(
            $pts
        );
    }
}