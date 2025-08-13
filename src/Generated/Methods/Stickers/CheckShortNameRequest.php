<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.checkShortName
 */
final class CheckShortNameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x284b3639;
    
    public string $predicate = 'stickers.checkShortName';
    
    public function getMethodName(): string
    {
        return 'stickers.checkShortName';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $shortName
     */
    public function __construct(
        public readonly string $shortName
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->shortName);
        return $buffer;
    }
}