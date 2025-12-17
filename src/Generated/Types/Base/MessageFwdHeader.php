<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messageFwdHeader
 */
final class MessageFwdHeader extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4e4df4bb;
    
    public string $predicate = 'messageFwdHeader';
    
    /**
     * @param int $date
     * @param true|null $imported
     * @param true|null $savedOut
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
        public readonly ?true $imported = null,
        public readonly ?true $savedOut = null,
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->imported) {
            $flags |= (1 << 7);
        }
        if ($this->savedOut) {
            $flags |= (1 << 11);
        }
        if ($this->fromId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->fromName !== null) {
            $flags |= (1 << 5);
        }
        if ($this->channelPost !== null) {
            $flags |= (1 << 2);
        }
        if ($this->postAuthor !== null) {
            $flags |= (1 << 3);
        }
        if ($this->savedFromPeer !== null) {
            $flags |= (1 << 4);
        }
        if ($this->savedFromMsgId !== null) {
            $flags |= (1 << 4);
        }
        if ($this->savedFromId !== null) {
            $flags |= (1 << 8);
        }
        if ($this->savedFromName !== null) {
            $flags |= (1 << 9);
        }
        if ($this->savedDate !== null) {
            $flags |= (1 << 10);
        }
        if ($this->psaType !== null) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->fromId->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::bytes($this->fromName);
        }
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->channelPost);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->postAuthor);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->savedFromPeer->serialize();
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->savedFromMsgId);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->savedFromId->serialize();
        }
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::bytes($this->savedFromName);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->savedDate);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::bytes($this->psaType);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $imported = (($flags & (1 << 7)) !== 0) ? true : null;
        $savedOut = (($flags & (1 << 11)) !== 0) ? true : null;
        $fromId = (($flags & (1 << 0)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $fromName = (($flags & (1 << 5)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $date = Deserializer::int32($__payload, $__offset);
        $channelPost = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $postAuthor = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $savedFromPeer = (($flags & (1 << 4)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $savedFromMsgId = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $savedFromId = (($flags & (1 << 8)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $savedFromName = (($flags & (1 << 9)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $savedDate = (($flags & (1 << 10)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $psaType = (($flags & (1 << 6)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

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