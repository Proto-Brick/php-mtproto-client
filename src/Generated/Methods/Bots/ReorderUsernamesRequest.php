<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.reorderUsernames
 */
final class ReorderUsernamesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9709b1c2;
    
    public string $predicate = 'bots.reorderUsernames';
    
    public function getMethodName(): string
    {
        return 'bots.reorderUsernames';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param list<string> $order
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly array $order
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::vectorOfStrings($this->order);
        return $buffer;
    }
}