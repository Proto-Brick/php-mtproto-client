<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getDefaultGroupPhotoEmojis
 */
final class GetDefaultGroupPhotoEmojisRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x915860ae;
    
    public string $predicate = 'account.getDefaultGroupPhotoEmojis';
    
    public function getMethodName(): string
    {
        return 'account.getDefaultGroupPhotoEmojis';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiList::class;
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