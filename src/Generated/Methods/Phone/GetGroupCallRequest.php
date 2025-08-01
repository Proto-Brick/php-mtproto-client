<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Phone\AbstractGroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.getGroupCall
 */
final class GetGroupCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 68699611;
    
    public string $_ = 'phone.getGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractGroupCall::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $limit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}