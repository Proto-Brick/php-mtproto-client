<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.joinGroupCallPresentation
 */
final class JoinGroupCallPresentationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcbea6bc4;
    
    public string $_ = 'phone.joinGroupCallPresentation';
    
    public function getMethodName(): string
    {
        return 'phone.joinGroupCallPresentation';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputGroupCall $call
     * @param array $params
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly array $params
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->bytes(json_encode($this->params, JSON_FORCE_OBJECT));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}