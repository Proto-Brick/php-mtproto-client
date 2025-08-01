<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.botCancelStarsSubscription
 */
final class BotCancelStarsSubscriptionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1845102114;
    
    public string $_ = 'payments.botCancelStarsSubscription';
    
    public function getMethodName(): string
    {
        return 'payments.botCancelStarsSubscription';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $chargeId
     * @param bool|null $restore
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $chargeId,
        public readonly ?bool $restore = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->restore) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->bytes($this->chargeId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}