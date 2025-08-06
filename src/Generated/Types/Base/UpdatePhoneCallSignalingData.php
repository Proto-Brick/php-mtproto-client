<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePhoneCallSignalingData
 */
final class UpdatePhoneCallSignalingData extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2661bf09;
    
    public string $_ = 'updatePhoneCallSignalingData';
    
    /**
     * @param int $phoneCallId
     * @param string $data
     */
    public function __construct(
        public readonly int $phoneCallId,
        public readonly string $data
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->phoneCallId);
        $buffer .= $serializer->bytes($this->data);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $phoneCallId = $deserializer->int64($stream);
        $data = $deserializer->bytes($stream);
        return new self(
            $phoneCallId,
            $data
        );
    }
}