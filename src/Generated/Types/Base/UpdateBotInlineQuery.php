<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotInlineQuery
 */
final class UpdateBotInlineQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x496f379c;
    
    public string $predicate = 'updateBotInlineQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param string $query
     * @param string $offset
     * @param AbstractGeoPoint|null $geo
     * @param InlineQueryPeerType|null $peerType
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly string $query,
        public readonly string $offset,
        public readonly ?AbstractGeoPoint $geo = null,
        public readonly ?InlineQueryPeerType $peerType = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->peerType !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->query);
        if ($flags & (1 << 0)) {
            $buffer .= $this->geo->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->peerType->serialize();
        }
        $buffer .= Serializer::bytes($this->offset);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $queryId = Deserializer::int64($stream);
        $userId = Deserializer::int64($stream);
        $query = Deserializer::bytes($stream);
        $geo = (($flags & (1 << 0)) !== 0) ? AbstractGeoPoint::deserialize($stream) : null;
        $peerType = (($flags & (1 << 1)) !== 0) ? InlineQueryPeerType::deserialize($stream) : null;
        $offset = Deserializer::bytes($stream);

        return new self(
            $queryId,
            $userId,
            $query,
            $offset,
            $geo,
            $peerType
        );
    }
}