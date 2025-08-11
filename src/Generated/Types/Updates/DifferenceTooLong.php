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
    public const CONSTRUCTOR_ID = 0x4afe8f6d;
    
    public string $_ = 'updates.differenceTooLong';
    
    /**
     * @param int $pts
     */
    public function __construct(
        public readonly int $pts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $pts = Deserializer::int32($stream);
        return new self(
            $pts
        );
    }
}