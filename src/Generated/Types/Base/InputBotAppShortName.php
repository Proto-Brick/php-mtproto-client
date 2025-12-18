<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $botId = AbstractInputUser::deserialize($__payload, $__offset);
        $shortName = Deserializer::bytes($__payload, $__offset);

        return new self(
            $botId,
            $shortName
        );
    }
}