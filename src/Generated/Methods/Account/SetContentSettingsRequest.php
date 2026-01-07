<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.setContentSettings
 */
final class SetContentSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb574b16b;
    
    public string $predicate = 'account.setContentSettings';
    
    public function getMethodName(): string
    {
        return 'account.setContentSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param true|null $sensitiveEnabled
     */
    public function __construct(
        public readonly ?true $sensitiveEnabled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sensitiveEnabled) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
}