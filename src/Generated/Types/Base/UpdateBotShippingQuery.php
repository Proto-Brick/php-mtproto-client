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
    public const CONSTRUCTOR_ID = 3048144253;
    
    public string $_ = 'updateBotShippingQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param string $payload
     * @param AbstractPostAddress $shippingAddress
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly string $payload,
        public readonly AbstractPostAddress $shippingAddress
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->queryId);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->bytes($this->payload);
        $buffer .= $this->shippingAddress->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $queryId = $deserializer->int64($stream);
        $userId = $deserializer->int64($stream);
        $payload = $deserializer->bytes($stream);
        $shippingAddress = AbstractPostAddress::deserialize($deserializer, $stream);
            return new self(
            $queryId,
            $userId,
            $payload,
            $shippingAddress
        );
    }
}