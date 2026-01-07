<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\Birthday;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateBirthday
 */
final class UpdateBirthdayRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcc6e0c11;
    
    public string $predicate = 'account.updateBirthday';
    
    public function getMethodName(): string
    {
        return 'account.updateBirthday';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param Birthday|null $birthday
     */
    public function __construct(
        public readonly ?Birthday $birthday = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->birthday !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->birthday->serialize();
        }
        return $buffer;
    }
}