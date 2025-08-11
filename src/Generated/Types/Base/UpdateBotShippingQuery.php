<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotShippingQuery
 */
final class UpdateBotShippingQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb5aefd7d;
    
    public string $_ = 'updateBotShippingQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param string $payload
     * @param PostAddress $shippingAddress
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly string $payload,
        public readonly PostAddress $shippingAddress
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->payload);
        $buffer .= $this->shippingAddress->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $queryId = Deserializer::int64($stream);
        $userId = Deserializer::int64($stream);
        $payload = Deserializer::bytes($stream);
        $shippingAddress = PostAddress::deserialize($stream);
        return new self(
            $queryId,
            $userId,
            $payload,
            $shippingAddress
        );
    }
}