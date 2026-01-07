<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\BotResults;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getInlineBotResults
 */
final class GetInlineBotResultsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x514e999d;
    
    public string $predicate = 'messages.getInlineBotResults';
    
    public function getMethodName(): string
    {
        return 'messages.getInlineBotResults';
    }
    
    public function getResponseClass(): string
    {
        return BotResults::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param AbstractInputPeer $peer
     * @param string $query
     * @param string $offset
     * @param AbstractInputGeoPoint|null $geoPoint
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly AbstractInputPeer $peer,
        public readonly string $query,
        public readonly string $offset,
        public readonly ?AbstractInputGeoPoint $geoPoint = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geoPoint !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->bot->serialize();
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->geoPoint->serialize();
        }
        $buffer .= Serializer::bytes($this->query);
        $buffer .= Serializer::bytes($this->offset);
        return $buffer;
    }
}