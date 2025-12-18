<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateSmsJob
 */
final class UpdateSmsJob extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf16269d4;
    
    public string $predicate = 'updateSmsJob';
    
    /**
     * @param string $jobId
     */
    public function __construct(
        public readonly string $jobId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->jobId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $jobId = Deserializer::bytes($__payload, $__offset);

        return new self(
            $jobId
        );
    }
}