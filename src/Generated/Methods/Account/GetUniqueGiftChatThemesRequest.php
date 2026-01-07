<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractChatThemes;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getUniqueGiftChatThemes
 */
final class GetUniqueGiftChatThemesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe42ce9c9;
    
    public string $predicate = 'account.getUniqueGiftChatThemes';
    
    public function getMethodName(): string
    {
        return 'account.getUniqueGiftChatThemes';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChatThemes::class;
    }
    /**
     * @param string $offset
     * @param int $limit
     * @param int $hash
     */
    public function __construct(
        public readonly string $offset,
        public readonly int $limit,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}