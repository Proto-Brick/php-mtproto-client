<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\PaidMessagesRevenue;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getPaidMessagesRevenue
 */
final class GetPaidMessagesRevenueRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x19ba4a67;
    
    public string $predicate = 'account.getPaidMessagesRevenue';
    
    public function getMethodName(): string
    {
        return 'account.getPaidMessagesRevenue';
    }
    
    public function getResponseClass(): string
    {
        return PaidMessagesRevenue::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param AbstractInputPeer|null $parentPeer
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly ?AbstractInputPeer $parentPeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->parentPeer !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->parentPeer->serialize();
        }
        $buffer .= $this->userId->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}