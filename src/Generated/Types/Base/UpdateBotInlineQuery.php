<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotInlineQuery
 */
final class UpdateBotInlineQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 1232025500;
    
    public string $_ = 'updateBotInlineQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param string $query
     * @param string $offset
     * @param AbstractGeoPoint|null $geo
     * @param AbstractInlineQueryPeerType|null $peerType
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly string $query,
        public readonly string $offset,
        public readonly ?AbstractGeoPoint $geo = null,
        public readonly ?AbstractInlineQueryPeerType $peerType = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geo !== null) $flags |= (1 << 0);
        if ($this->peerType !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->queryId);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->bytes($this->query);
        if ($flags & (1 << 0)) {
            $buffer .= $this->geo->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->peerType->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->offset);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $queryId = $deserializer->int64($stream);
        $userId = $deserializer->int64($stream);
        $query = $deserializer->bytes($stream);
        $geo = ($flags & (1 << 0)) ? AbstractGeoPoint::deserialize($deserializer, $stream) : null;
        $peerType = ($flags & (1 << 1)) ? AbstractInlineQueryPeerType::deserialize($deserializer, $stream) : null;
        $offset = $deserializer->bytes($stream);
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