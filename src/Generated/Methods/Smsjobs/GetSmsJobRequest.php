<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SmsJob;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/smsjobs.getSmsJob
 */
final class GetSmsJobRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x778d902f;
    
    public string $predicate = 'smsjobs.getSmsJob';
    
    public function getMethodName(): string
    {
        return 'smsjobs.getSmsJob';
    }
    
    public function getResponseClass(): string
    {
        return SmsJob::class;
    }
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
}