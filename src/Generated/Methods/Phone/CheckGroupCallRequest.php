<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.checkGroupCall
 */
final class CheckGroupCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb59cf977;
    
    public string $_ = 'phone.checkGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.checkGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param InputGroupCall $call
     * @param list<int> $sources
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly array $sources
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfInts($this->sources);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}