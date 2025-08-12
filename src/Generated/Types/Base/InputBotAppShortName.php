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
    public const CONSTRUCTOR_ID = 0x908c0407;
    
    public string $predicate = 'inputBotAppShortName';
    
    /**
     * @param AbstractInputUser $botId
     * @param string $shortName
     */
    public function __construct(
        public readonly AbstractInputUser $botId,
        public readonly string $shortName
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->botId->serialize();
        $buffer .= Serializer::bytes($this->shortName);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $botId = AbstractInputUser::deserialize($stream);
        $shortName = Deserializer::bytes($stream);

        return new self(
            $botId,
            $shortName
        );
    }
}