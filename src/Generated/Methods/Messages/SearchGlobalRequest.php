<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.searchGlobal
 */
final class SearchGlobalRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4bc6589a;
    
    public string $_ = 'messages.searchGlobal';
    
    public function getMethodName(): string
    {
        return 'messages.searchGlobal';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param string $q
     * @param AbstractMessagesFilter $filter
     * @param int $minDate
     * @param int $maxDate
     * @param int $offsetRate
     * @param AbstractInputPeer $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @param bool|null $broadcastsOnly
     * @param bool|null $groupsOnly
     * @param bool|null $usersOnly
     * @param int|null $folderId
     */
    public function __construct(
        public readonly string $q,
        public readonly AbstractMessagesFilter $filter,
        public readonly int $minDate,
        public readonly int $maxDate,
        public readonly int $offsetRate,
        public readonly AbstractInputPeer $offsetPeer,
        public readonly int $offsetId,
        public readonly int $limit,
        public readonly ?bool $broadcastsOnly = null,
        public readonly ?bool $groupsOnly = null,
        public readonly ?bool $usersOnly = null,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcastsOnly) $flags |= (1 << 1);
        if ($this->groupsOnly) $flags |= (1 << 2);
        if ($this->usersOnly) $flags |= (1 << 3);
        if ($this->folderId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->folderId);
        }
        $buffer .= $serializer->bytes($this->q);
        $buffer .= $this->filter->serialize($serializer);
        $buffer .= $serializer->int32($this->minDate);
        $buffer .= $serializer->int32($this->maxDate);
        $buffer .= $serializer->int32($this->offsetRate);
        $buffer .= $this->offsetPeer->serialize($serializer);
        $buffer .= $serializer->int32($this->offsetId);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}