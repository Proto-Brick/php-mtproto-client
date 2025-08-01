<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePhoneCall
 */
final class UpdatePhoneCall extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2869914398;
    
    public string $_ = 'updatePhoneCall';
    
    /**
     * @param AbstractPhoneCall $phoneCall
     */
    public function __construct(
        public readonly AbstractPhoneCall $phoneCall
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->phoneCall->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $phoneCall = AbstractPhoneCall::deserialize($deserializer, $stream);
            return new self(
            $phoneCall
        );
    }
}