<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageFwdHeader
 */
final class MessageFwdHeader extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4e4df4bb;
    
    public string $_ = 'messageFwdHeader';
    
    /**
     * @param int $date
     * @param bool|null $imported
     * @param bool|null $savedOut
     * @param AbstractPeer|null $fromId
     * @param string|null $fromName
     * @param int|null $channelPost
     * @param string|null $postAuthor
     * @param AbstractPeer|null $savedFromPeer
     * @param int|null $savedFromMsgId
     * @param AbstractPeer|null $savedFromId
     * @param string|null $savedFromName
     * @param int|null $savedDate
     * @param string|null $psaType
     */
    public function __construct(
        public readonly int $date,
        public readonly ?bool $imported = null,
        public readonly ?bool $savedOut = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?string $fromName = null,
        public readonly ?int $channelPost = null,
        public readonly ?string $postAuthor = null,
        public readonly ?AbstractPeer $savedFromPeer = null,
        public readonly ?int $savedFromMsgId = null,
        public readonly ?AbstractPeer $savedFromId = null,
        public readonly ?string $savedFromName = null,
        public readonly ?int $savedDate = null,
        public readonly ?string $psaType = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->imported) $flags |= (1 << 7);
        if ($this->savedOut) $flags |= (1 << 11);
        if ($this->fromId !== null) $flags |= (1 << 0);
        if ($this->fromName !== null) $flags |= (1 << 5);
        if ($this->channelPost !== null) $flags |= (1 << 2);
        if ($this->postAuthor !== null) $flags |= (1 << 3);
        if ($this->savedFromPeer !== null) $flags |= (1 << 4);
        if ($this->savedFromMsgId !== null) $flags |= (1 << 4);
        if ($this->savedFromId !== null) $flags |= (1 << 8);
        if ($this->savedFromName !== null) $flags |= (1 << 9);
        if ($this->savedDate !== null) $flags |= (1 << 10);
        if ($this->psaType !== null) $flags |= (1 << 6);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->fromId->serialize($serializer);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->bytes($this->fromName);
        }
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->channelPost);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->postAuthor);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->savedFromPeer->serialize($serializer);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->savedFromMsgId);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->savedFromId->serialize($serializer);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $serializer->bytes($this->savedFromName);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->int32($this->savedDate);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->bytes($this->psaType);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $imported = ($flags & (1 << 7)) ? true : null;
        $savedOut = ($flags & (1 << 11)) ? true : null;
        $fromId = ($flags & (1 << 0)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $fromName = ($flags & (1 << 5)) ? $deserializer->bytes($stream) : null;
        $date = $deserializer->int32($stream);
        $channelPost = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $postAuthor = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $savedFromPeer = ($flags & (1 << 4)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $savedFromMsgId = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $savedFromId = ($flags & (1 << 8)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $savedFromName = ($flags & (1 << 9)) ? $deserializer->bytes($stream) : null;
        $savedDate = ($flags & (1 << 10)) ? $deserializer->int32($stream) : null;
        $psaType = ($flags & (1 << 6)) ? $deserializer->bytes($stream) : null;
        return new self(
            $date,
            $imported,
            $savedOut,
            $fromId,
            $fromName,
            $channelPost,
            $postAuthor,
            $savedFromPeer,
            $savedFromMsgId,
            $savedFromId,
            $savedFromName,
            $savedDate,
            $psaType
        );
    }
}