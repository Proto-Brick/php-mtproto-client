<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSavedDialogs;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSavedDialogs
 */
final class GetSavedDialogsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5381d21a;
    
    public string $_ = 'messages.getSavedDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getSavedDialogs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedDialogs::class;
    }
    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param AbstractInputPeer $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param bool|null $excludePinned
     */
    public function __construct(
        public readonly int $offsetDate,
        public readonly int $offsetId,
        public readonly AbstractInputPeer $offsetPeer,
        public readonly int $limit,
        public readonly int $hash,
        public readonly ?bool $excludePinned = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludePinned) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

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