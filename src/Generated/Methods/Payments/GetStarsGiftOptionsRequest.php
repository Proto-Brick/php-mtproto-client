<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsGiftOption;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarsGiftOptions
 */
final class GetStarsGiftOptionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd3c96bc8;
    
    public string $predicate = 'payments.getStarsGiftOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsGiftOptions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . StarsGiftOption::class . '>';
    }
    /**
     * @param AbstractInputUser|null $userId
     */
    public function __construct(
        public readonly ?AbstractInputUser $userId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->userId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->userId->serialize();
        }
        return $buffer;
    }
}