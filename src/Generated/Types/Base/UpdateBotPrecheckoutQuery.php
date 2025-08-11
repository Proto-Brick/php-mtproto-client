<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotPrecheckoutQuery
 */
final class UpdateBotPrecheckoutQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8caa9a96;
    
    public string $_ = 'updateBotPrecheckoutQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param string $payload
     * @param string $currency
     * @param int $totalAmount
     * @param PaymentRequestedInfo|null $info
     * @param string|null $shippingOptionId
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly string $payload,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly ?PaymentRequestedInfo $info = null,
        public readonly ?string $shippingOptionId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->info !== null) $flags |= (1 << 0);
        if ($this->shippingOptionId !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->payload);
        if ($flags & (1 << 0)) {
            $buffer .= $this->info->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->shippingOptionId);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $queryId = Deserializer::int64($stream);
        $userId = Deserializer::int64($stream);
        $payload = Deserializer::bytes($stream);
        $info = ($flags & (1 << 0)) ? PaymentRequestedInfo::deserialize($stream) : null;
        $shippingOptionId = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $currency = Deserializer::bytes($stream);
        $totalAmount = Deserializer::int64($stream);
        return new self(
            $queryId,
            $userId,
            $payload,
            $currency,
            $totalAmount,
            $info,
            $shippingOptionId
        );
    }
}