<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSuggestedPostApproval
 */
final class MessageActionSuggestedPostApproval extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xee7a1596;
    
    public string $predicate = 'messageActionSuggestedPostApproval';
    
    /**
     * @param true|null $rejected
     * @param true|null $balanceTooLow
     * @param string|null $rejectComment
     * @param int|null $scheduleDate
     * @param AbstractStarsAmount|null $price
     */
    public function __construct(
        public readonly ?true $rejected = null,
        public readonly ?true $balanceTooLow = null,
        public readonly ?string $rejectComment = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?AbstractStarsAmount $price = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->rejected) {
            $flags |= (1 << 0);
        }
        if ($this->balanceTooLow) {
            $flags |= (1 << 1);
        }
        if ($this->rejectComment !== null) {
            $flags |= (1 << 2);
        }
        if ($this->scheduleDate !== null) {
            $flags |= (1 << 3);
        }
        if ($this->price !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->rejectComment);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->price->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $rejected = (($flags & (1 << 0)) !== 0) ? true : null;
        $balanceTooLow = (($flags & (1 << 1)) !== 0) ? true : null;
        $rejectComment = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $scheduleDate = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($stream) : null;
        $price = (($flags & (1 << 4)) !== 0) ? AbstractStarsAmount::deserialize($stream) : null;

        return new self(
            $rejected,
            $balanceTooLow,
            $rejectComment,
            $scheduleDate,
            $price
        );
    }
}