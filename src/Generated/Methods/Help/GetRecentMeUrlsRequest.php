<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\RecentMeUrls;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getRecentMeUrls
 */
final class GetRecentMeUrlsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3dc0f114;
    
    public string $predicate = 'help.getRecentMeUrls';
    
    public function getMethodName(): string
    {
        return 'help.getRecentMeUrls';
    }
    
    public function getResponseClass(): string
    {
        return RecentMeUrls::class;
    }
    /**
     * @param string $referer
     */
    public function __construct(
        public readonly string $referer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->referer);
        return $buffer;
    }
}