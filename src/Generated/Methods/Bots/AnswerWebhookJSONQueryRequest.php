<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.answerWebhookJSONQuery
 */
final class AnswerWebhookJSONQueryRequest extends RpcRequest
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
}