<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateReadMonoForumOutbox
 */
final class UpdateReadMonoForumOutbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa4a79376;
    
    public string $predicate = 'updateReadMonoForumOutbox';
    
    /**
     * @param int $channelId
     * @param AbstractPeer $savedPeerId
     * @param int $readMaxId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly AbstractPeer $savedPeerId,
        public readonly int $readMaxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= $this->savedPeerId->serialize();
        $buffer .= Serializer::int32($this->readMaxId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $channelId = Deserializer::int64($stream);
        $savedPeerId = AbstractPeer::deserialize($stream);
        $readMaxId = Deserializer::int32($stream);

        return new self(
            $channelId,
            $savedPeerId,
            $readMaxId
        );
    }
}