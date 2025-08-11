<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/autoSaveException
 */
final class AutoSaveException extends TlObject
{
    public const CONSTRUCTOR_ID = 0x81602d47;
    
    public string $_ = 'autoSaveException';
    
    /**
     * @param AbstractPeer $peer
     * @param AutoSaveSettings $settings
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AutoSaveSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->settings->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $peer = AbstractPeer::deserialize($stream);
        $settings = AutoSaveSettings::deserialize($stream);
        return new self(
            $peer,
            $settings
        );
    }
}