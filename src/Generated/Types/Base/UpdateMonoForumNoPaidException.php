<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateMonoForumNoPaidException
 */
final class UpdateMonoForumNoPaidException extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9f812b08;
    
    public string $predicate = 'updateMonoForumNoPaidException';
    
    /**
     * @param int $channelId
     * @param AbstractPeer $savedPeerId
     * @param true|null $exception
     */
    public function __construct(
        public readonly int $channelId,
        public readonly AbstractPeer $savedPeerId,
        public readonly ?true $exception = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->exception) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= $this->savedPeerId->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $exception = ($flags & (1 << 0)) ? true : null;
        $channelId = Deserializer::int64($stream);
        $savedPeerId = AbstractPeer::deserialize($stream);

        return new self(
            $channelId,
            $savedPeerId,
            $exception
        );
    }
}