<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Phone\GroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.getGroupCall
 */
final class GetGroupCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x41845db;
    
    public string $predicate = 'phone.getGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return GroupCall::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}