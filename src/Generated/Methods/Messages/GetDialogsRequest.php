<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractDialogs;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getDialogs
 */
final class GetDialogsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2700397391;
    
    public string $_ = 'messages.getDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getDialogs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDialogs::class;
    }
    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param AbstractInputPeer $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param bool|null $excludePinned
     * @param int|null $folderId
     */
    public function __construct(
        public readonly int $offsetDate,
        public readonly int $offsetId,
        public readonly AbstractInputPeer $offsetPeer,
        public readonly int $limit,
        public readonly int $hash,
        public readonly ?bool $excludePinned = null,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludePinned) $flags |= (1 << 0);
        if ($this->folderId !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->folderId);
        }
        $buffer .= $serializer->int32($this->offsetDate);
        $buffer .= $serializer->int32($this->offsetId);
        $buffer .= $this->offsetPeer->serialize($serializer);
        $buffer .= $serializer->int32($this->limit);
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}