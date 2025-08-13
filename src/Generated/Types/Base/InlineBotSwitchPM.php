<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inlineBotSwitchPM
 */
final class InlineBotSwitchPM extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3c20629f;
    
    public string $predicate = 'inlineBotSwitchPM';
    
    /**
     * @param string $text
     * @param string $startParam
     */
    public function __construct(
        public readonly string $text,
        public readonly string $startParam
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::bytes($this->startParam);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $text = Deserializer::bytes($stream);
        $startParam = Deserializer::bytes($stream);

        return new self(
            $text,
            $startParam
        );
    }
}