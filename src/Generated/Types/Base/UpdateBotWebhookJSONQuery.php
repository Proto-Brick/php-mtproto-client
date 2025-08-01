<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotWebhookJSONQuery
 */
final class UpdateBotWebhookJSONQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2610053286;
    
    public string $_ = 'updateBotWebhookJSONQuery';
    
    /**
     * @param int $queryId
     * @param array $data
     * @param int $timeout
     */
    public function __construct(
        public readonly int $queryId,
        public readonly array $data,
        public readonly int $timeout
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->queryId);
        $buffer .= (new DataJSON(json_encode($this->data)))->serialize($serializer);
        $buffer .= $serializer->int32($this->timeout);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $queryId = $deserializer->int64($stream);
        $data = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
        $timeout = $deserializer->int32($stream);
            return new self(
            $queryId,
            $data,
            $timeout
        );
    }
}