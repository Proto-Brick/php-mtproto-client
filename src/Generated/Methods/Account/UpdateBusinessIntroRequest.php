<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessIntro;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateBusinessIntro
 */
final class UpdateBusinessIntroRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa614d034;
    
    public string $predicate = 'account.updateBusinessIntro';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessIntro';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputBusinessIntro|null $intro
     */
    public function __construct(
        public readonly ?InputBusinessIntro $intro = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->intro !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->intro->serialize();
        }
        return $buffer;
    }
}