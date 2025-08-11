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
    public const CONSTRUCTOR_ID = 0x9b9240a6;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::bytes(json_encode($this->data, JSON_FORCE_OBJECT));
        $buffer .= Serializer::int32($this->timeout);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $queryId = Deserializer::int64($stream);
        $data = Deserializer::deserializeDataJSON($stream);
        $timeout = Deserializer::int32($stream);
        return new self(
            $queryId,
            $data,
            $timeout
        );
    }
}