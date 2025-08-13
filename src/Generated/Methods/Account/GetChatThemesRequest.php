<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractThemes;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getChatThemes
 */
final class GetChatThemesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd638de89;
    
    public string $predicate = 'account.getChatThemes';
    
    public function getMethodName(): string
    {
        return 'account.getChatThemes';
    }
    
    public function getResponseClass(): string
    {
        return AbstractThemes::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}