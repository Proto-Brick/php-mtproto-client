<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.toggleAllStoriesHidden
 */
final class ToggleAllStoriesHiddenRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7c2557c4;
    
    public string $predicate = 'stories.toggleAllStoriesHidden';
    
    public function getMethodName(): string
    {
        return 'stories.toggleAllStoriesHidden';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool $hidden
     */
    public function __construct(
        public readonly bool $hidden
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->hidden ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}