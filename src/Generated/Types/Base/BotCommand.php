<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/botCommand
 */
final class BotCommand extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc27ac8c7;
    
    public string $predicate = 'botCommand';
    
    /**
     * @param string $command
     * @param string $description
     */
    public function __construct(
        public readonly string $command,
        public readonly string $description
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->command);
        $buffer .= Serializer::bytes($this->description);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $command = Deserializer::bytes($__payload, $__offset);
        $description = Deserializer::bytes($__payload, $__offset);

        return new self(
            $command,
            $description
        );
    }
}