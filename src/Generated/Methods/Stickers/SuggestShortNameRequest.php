<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Stickers\SuggestedShortName;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.suggestShortName
 */
final class SuggestShortNameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4dafc503;
    
    public string $predicate = 'stickers.suggestShortName';
    
    public function getMethodName(): string
    {
        return 'stickers.suggestShortName';
    }
    
    public function getResponseClass(): string
    {
        return SuggestedShortName::class;
    }
    /**
     * @param string $title
     */
    public function __construct(
        public readonly string $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        return $buffer;
    }
}