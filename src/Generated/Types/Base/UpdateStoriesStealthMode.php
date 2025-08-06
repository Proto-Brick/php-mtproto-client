<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateStoriesStealthMode
 */
final class UpdateStoriesStealthMode extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2c084dc1;
    
    public string $_ = 'updateStoriesStealthMode';
    
    /**
     * @param StoriesStealthMode $stealthMode
     */
    public function __construct(
        public readonly StoriesStealthMode $stealthMode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stealthMode->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $stealthMode = StoriesStealthMode::deserialize($deserializer, $stream);
        return new self(
            $stealthMode
        );
    }
}