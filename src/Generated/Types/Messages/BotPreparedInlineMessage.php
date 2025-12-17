<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.botPreparedInlineMessage
 */
final class BotPreparedInlineMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8ecf0511;
    
    public string $predicate = 'messages.botPreparedInlineMessage';
    
    /**
     * @param string $id
     * @param int $expireDate
     */
    public function __construct(
        public readonly string $id,
        public readonly int $expireDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::int32($this->expireDate);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::bytes($__payload, $__offset);
        $expireDate = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $expireDate
        );
    }
}