<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.blockFromReplies
 */
final class BlockFromRepliesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x29a8962c;
    
    public string $predicate = 'contacts.blockFromReplies';
    
    public function getMethodName(): string
    {
        return 'contacts.blockFromReplies';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $msgId
     * @param true|null $deleteMessage
     * @param true|null $deleteHistory
     * @param true|null $reportSpam
     */
    public function __construct(
        public readonly int $msgId,
        public readonly ?true $deleteMessage = null,
        public readonly ?true $deleteHistory = null,
        public readonly ?true $reportSpam = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->deleteMessage) {
            $flags |= (1 << 0);
        }
        if ($this->deleteHistory) {
            $flags |= (1 << 1);
        }
        if ($this->reportSpam) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
}