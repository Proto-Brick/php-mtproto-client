<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/smsJob
 */
final class SmsJob extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe6a1eeb8;
    
    public string $predicate = 'smsJob';
    
    /**
     * @param string $jobId
     * @param string $phoneNumber
     * @param string $text
     */
    public function __construct(
        public readonly string $jobId,
        public readonly string $phoneNumber,
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->jobId);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $jobId = Deserializer::bytes($__payload, $__offset);
        $phoneNumber = Deserializer::bytes($__payload, $__offset);
        $text = Deserializer::bytes($__payload, $__offset);

        return new self(
            $jobId,
            $phoneNumber,
            $text
        );
    }
}