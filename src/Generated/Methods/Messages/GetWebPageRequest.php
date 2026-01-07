<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\WebPage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getWebPage
 */
final class GetWebPageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8d9692a3;
    
    public string $predicate = 'messages.getWebPage';
    
    public function getMethodName(): string
    {
        return 'messages.getWebPage';
    }
    
    public function getResponseClass(): string
    {
        return WebPage::class;
    }
    /**
     * @param string $url
     * @param int $hash
     */
    public function __construct(
        public readonly string $url,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}