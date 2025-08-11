<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageReplies
 */
final class MessageReplies extends TlObject
{
    public const CONSTRUCTOR_ID = 0x83d60fc2;
    
    public string $_ = 'messageReplies';
    
    /**
     * @param int $replies
     * @param int $repliesPts
     * @param bool|null $comments
     * @param list<AbstractPeer>|null $recentRepliers
     * @param int|null $channelId
     * @param int|null $maxId
     * @param int|null $readMaxId
     */
    public function __construct(
        public readonly int $replies,
        public readonly int $repliesPts,
        public readonly ?bool $comments = null,
        public readonly ?array $recentRepliers = null,
        public readonly ?int $channelId = null,
        public readonly ?int $maxId = null,
        public readonly ?int $readMaxId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->comments) $flags |= (1 << 0);
        if ($this->recentRepliers !== null) $flags |= (1 << 1);
        if ($this->channelId !== null) $flags |= (1 << 0);
        if ($this->maxId !== null) $flags |= (1 << 2);
        if ($this->readMaxId !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->replies);
        $buffer .= Serializer::int32($this->repliesPts);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->recentRepliers);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->channelId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->maxId);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->readMaxId);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $comments = ($flags & (1 << 0)) ? true : null;
        $replies = Deserializer::int32($stream);
        $repliesPts = Deserializer::int32($stream);
        $recentRepliers = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']) : null;
        $channelId = ($flags & (1 << 0)) ? Deserializer::int64($stream) : null;
        $maxId = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $readMaxId = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        return new self(
            $replies,
            $repliesPts,
            $comments,
            $recentRepliers,
            $channelId,
            $maxId,
            $readMaxId
        );
    }
}