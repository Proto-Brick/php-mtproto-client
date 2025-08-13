<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.reportAntiSpamFalsePositive
 */
final class ReportAntiSpamFalsePositiveRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa850a693;
    
    public string $predicate = 'channels.reportAntiSpamFalsePositive';
    
    public function getMethodName(): string
    {
        return 'channels.reportAntiSpamFalsePositive';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
}