<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/autoSaveException
 */
final class AutoSaveException extends AbstractAutoSaveException
{
    public const CONSTRUCTOR_ID = 2170563911;
    
    public string $_ = 'autoSaveException';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractAutoSaveSettings $settings
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractAutoSaveSettings $settings
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->settings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $settings = AbstractAutoSaveSettings::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $settings
        );
    }
}