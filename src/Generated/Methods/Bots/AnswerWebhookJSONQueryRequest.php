<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.answerWebhookJSONQuery
 */
final class AnswerWebhookJSONQueryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3860938573;
    
    public string $_ = 'bots.answerWebhookJSONQuery';
    
    public function getMethodName(): string
    {
        return 'bots.answerWebhookJSONQuery';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $queryId
     * @param array $data
     */
    public function __construct(
        public readonly int $queryId,
        public readonly array $data
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->queryId);
        $buffer .= (new DataJSON(json_encode($this->data)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}