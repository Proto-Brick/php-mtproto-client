<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/smsjobs.updateSettings
 */
final class UpdateSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x93fa0bf;
    
    public string $predicate = 'smsjobs.updateSettings';
    
    public function getMethodName(): string
    {
        return 'smsjobs.updateSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param true|null $allowInternational
     */
    public function __construct(
        public readonly ?true $allowInternational = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowInternational) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
}