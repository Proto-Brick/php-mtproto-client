<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotPurchasedPaidMedia
 */
final class UpdateBotPurchasedPaidMedia extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 675009298;
    
    public string $_ = 'updateBotPurchasedPaidMedia';
    
    /**
     * @param int $userId
     * @param string $payload
     * @param int $qts
     */
    public function __construct(
        public readonly int $userId,
        public readonly string $payload,
        public readonly int $qts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->bytes($this->payload);
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $payload = $deserializer->bytes($stream);
        $qts = $deserializer->int32($stream);
            return new self(
            $userId,
            $payload,
            $qts
        );
    }
}