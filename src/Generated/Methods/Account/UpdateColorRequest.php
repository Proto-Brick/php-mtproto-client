<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateColor
 */
final class UpdateColorRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7cefa15d;
    
    public string $predicate = 'account.updateColor';
    
    public function getMethodName(): string
    {
        return 'account.updateColor';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param true|null $forProfile
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     */
    public function __construct(
        public readonly ?true $forProfile = null,
        public readonly ?int $color = null,
        public readonly ?int $backgroundEmojiId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forProfile) {
            $flags |= (1 << 1);
        }
        if ($this->color !== null) {
            $flags |= (1 << 2);
        }
        if ($this->backgroundEmojiId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->color);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->backgroundEmojiId);
        }
        return $buffer;
    }
}