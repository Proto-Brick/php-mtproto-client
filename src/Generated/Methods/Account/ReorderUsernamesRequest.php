<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.reorderUsernames
 */
final class ReorderUsernamesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xef500eab;
    
    public string $predicate = 'account.reorderUsernames';
    
    public function getMethodName(): string
    {
        return 'account.reorderUsernames';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<string> $order
     */
    public function __construct(
        public readonly array $order
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfStrings($this->order);
        return $buffer;
    }
}