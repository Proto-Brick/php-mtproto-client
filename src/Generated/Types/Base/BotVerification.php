<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/botVerification
 */
final class BotVerification extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf93cd45c;
    
    public string $predicate = 'botVerification';
    
    /**
     * @param int $botId
     * @param int $icon
     * @param string $description
     */
    public function __construct(
        public readonly int $botId,
        public readonly int $icon,
        public readonly string $description
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::int64($this->icon);
        $buffer .= Serializer::bytes($this->description);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $botId = Deserializer::int64($__payload, $__offset);
        $icon = Deserializer::int64($__payload, $__offset);
        $description = Deserializer::bytes($__payload, $__offset);

        return new self(
            $botId,
            $icon,
            $description
        );
    }
}