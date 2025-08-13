<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReportResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.report
 */
final class ReportRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfc78af9b;
    
    public string $predicate = 'messages.report';
    
    public function getMethodName(): string
    {
        return 'messages.report';
    }
    
    public function getResponseClass(): string
    {
        return AbstractReportResult::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     * @param string $option
     * @param string $message
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id,
        public readonly string $option,
        public readonly string $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        $buffer .= Serializer::bytes($this->option);
        $buffer .= Serializer::bytes($this->message);
        return $buffer;
    }
}