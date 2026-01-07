<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.checkedHistoryImportPeer
 */
final class CheckedHistoryImportPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa24de717;
    
    public string $predicate = 'messages.checkedHistoryImportPeer';
    
    /**
     * @param string $confirmText
     */
    public function __construct(
        public readonly string $confirmText
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->confirmText);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $confirmText = Deserializer::bytes($__payload, $__offset);

        return new self(
            $confirmText
        );
    }
}