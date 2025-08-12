<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.toggleGroupCallStartSubscription
 */
final class ToggleGroupCallStartSubscriptionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x219c34e6;
    
    public string $predicate = 'phone.toggleGroupCallStartSubscription';
    
    public function getMethodName(): string
    {
        return 'phone.toggleGroupCallStartSubscription';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputGroupCall $call
     * @param bool $subscribed
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly bool $subscribed
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= ($this->subscribed ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}