<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractEmojiGroups;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getEmojiProfilePhotoGroups
 */
final class GetEmojiProfilePhotoGroupsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x21a548f3;
    
    public string $predicate = 'messages.getEmojiProfilePhotoGroups';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiProfilePhotoGroups';
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