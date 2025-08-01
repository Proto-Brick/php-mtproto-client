<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotAppShortName
 */
final class InputBotAppShortName extends AbstractInputBotApp
{
    public const CONSTRUCTOR_ID = 2425095175;
    
    public string $_ = 'inputBotAppShortName';
    
    /**
     * @param AbstractInputUser $botId
     * @param string $shortName
     */
    public function __construct(
        public readonly AbstractInputUser $botId,
        public readonly string $shortName
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->botId->serialize($serializer);
        $buffer .= $serializer->bytes($this->shortName);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $botId = AbstractInputUser::deserialize($deserializer, $stream);
        $shortName = $deserializer->bytes($stream);
            return new self(
            $botId,
            $shortName
        );
    }
}