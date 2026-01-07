<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeerColor;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateColor
 */
final class UpdateColorRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x684d214e;
    
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
     * @param AbstractPeerColor|null $color
     */
    public function __construct(
        public readonly ?true $forProfile = null,
        public readonly ?AbstractPeerColor $color = null
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
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= $this->color->serialize();
        }
        return $buffer;
    }
}