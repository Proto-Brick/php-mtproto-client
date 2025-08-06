<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.editGroupCallTitle
 */
final class EditGroupCallTitleRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1ca6ac0a;
    
    public string $_ = 'phone.editGroupCallTitle';
    
    public function getMethodName(): string
    {
        return 'phone.editGroupCallTitle';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputGroupCall $call
     * @param string $title
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly string $title
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->bytes($this->title);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}