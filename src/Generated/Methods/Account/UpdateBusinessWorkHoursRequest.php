<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\BusinessWorkHours;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateBusinessWorkHours
 */
final class UpdateBusinessWorkHoursRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4b00e066;
    
    public string $predicate = 'account.updateBusinessWorkHours';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessWorkHours';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param BusinessWorkHours|null $businessWorkHours
     */
    public function __construct(
        public readonly ?BusinessWorkHours $businessWorkHours = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->businessWorkHours !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->businessWorkHours->serialize();
        }
        return $buffer;
    }
}