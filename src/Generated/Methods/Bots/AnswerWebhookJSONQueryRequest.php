<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.answerWebhookJSONQuery
 */
final class AnswerWebhookJSONQueryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe6213f4d;
    
    public string $predicate = 'bots.answerWebhookJSONQuery';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::serializeDataJSON($this->data);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}