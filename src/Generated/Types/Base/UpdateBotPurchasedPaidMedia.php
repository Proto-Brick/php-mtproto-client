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
    public const CONSTRUCTOR_ID = 0x283bd312;
    
    public string $predicate = 'updateBotPurchasedPaidMedia';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->payload);
        $buffer .= Serializer::int32($this->qts);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = Deserializer::int64($stream);
        $payload = Deserializer::bytes($stream);
        $qts = Deserializer::int32($stream);

        return new self(
            $userId,
            $payload,
            $qts
        );
    }
}