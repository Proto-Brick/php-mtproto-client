<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getDefaultProfilePhotoEmojis
 */
final class GetDefaultProfilePhotoEmojisRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe2750328;
    
    public string $predicate = 'account.getDefaultProfilePhotoEmojis';
    
    public function getMethodName(): string
    {
        return 'account.getDefaultProfilePhotoEmojis';
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