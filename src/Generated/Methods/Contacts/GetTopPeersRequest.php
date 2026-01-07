<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Contacts\AbstractTopPeers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getTopPeers
 */
final class GetTopPeersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x973478b6;
    
    public string $predicate = 'contacts.getTopPeers';
    
    public function getMethodName(): string
    {
        return 'contacts.getTopPeers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractTopPeers::class;
    }
    /**
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @param true|null $correspondents
     * @param true|null $botsPm
     * @param true|null $botsInline
     * @param true|null $phoneCalls
     * @param true|null $forwardUsers
     * @param true|null $forwardChats
     * @param true|null $groups
     * @param true|null $channels
     * @param true|null $botsApp
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $limit,
        public readonly int $hash,
        public readonly ?true $correspondents = null,
        public readonly ?true $botsPm = null,
        public readonly ?true $botsInline = null,
        public readonly ?true $phoneCalls = null,
        public readonly ?true $forwardUsers = null,
        public readonly ?true $forwardChats = null,
        public readonly ?true $groups = null,
        public readonly ?true $channels = null,
        public readonly ?true $botsApp = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->correspondents) {
            $flags |= (1 << 0);
        }
        if ($this->botsPm) {
            $flags |= (1 << 1);
        }
        if ($this->botsInline) {
            $flags |= (1 << 2);
        }
        if ($this->phoneCalls) {
            $flags |= (1 << 3);
        }
        if ($this->forwardUsers) {
            $flags |= (1 << 4);
        }
        if ($this->forwardChats) {
            $flags |= (1 << 5);
        }
        if ($this->groups) {
            $flags |= (1 << 10);
        }
        if ($this->channels) {
            $flags |= (1 << 15);
        }
        if ($this->botsApp) {
            $flags |= (1 << 16);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}