<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.dhConfigNotModified
 */
final class DhConfigNotModified extends AbstractDhConfig
{
    public const CONSTRUCTOR_ID = 0xc0e24635;
    
    public string $_ = 'messages.dhConfigNotModified';
    
    /**
     * @param string $random
     */
    public function __construct(
        public readonly string $random
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->random);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $random = Deserializer::bytes($stream);
        return new self(
            $random
        );
    }
}