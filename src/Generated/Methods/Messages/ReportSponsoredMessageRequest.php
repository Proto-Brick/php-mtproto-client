<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Channels\AbstractSponsoredMessageReportResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.reportSponsoredMessage
 */
final class ReportSponsoredMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x12cbf0c4;
    
    public string $predicate = 'messages.reportSponsoredMessage';
    
    public function getMethodName(): string
    {
        return 'messages.reportSponsoredMessage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSponsoredMessageReportResult::class;
    }
    /**
     * @param string $randomId
     * @param string $option
     */
    public function __construct(
        public readonly string $randomId,
        public readonly string $option
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->randomId);
        $buffer .= Serializer::bytes($this->option);
        return $buffer;
    }
}