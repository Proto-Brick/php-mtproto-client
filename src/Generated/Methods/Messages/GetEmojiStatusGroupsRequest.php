<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractEmojiGroups;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getEmojiStatusGroups
 */
final class GetEmojiStatusGroupsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2ecd56cd;
    
    public string $predicate = 'messages.getEmojiStatusGroups';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiStatusGroups';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiGroups::class;
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
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}