<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getBotBusinessConnection
 */
final class GetBotBusinessConnectionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x76a86270;
    
    public string $predicate = 'account.getBotBusinessConnection';
    
    public function getMethodName(): string
    {
        return 'account.getBotBusinessConnection';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param string $connectionId
     */
    public function __construct(
        public readonly string $connectionId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->connectionId);
        return $buffer;
    }
}