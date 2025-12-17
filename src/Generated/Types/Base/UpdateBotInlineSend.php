<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotInlineSend
 */
final class UpdateBotInlineSend extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x12f12a07;
    
    public string $predicate = 'updateBotInlineSend';
    
    /**
     * @param int $userId
     * @param string $query
     * @param string $id
     * @param AbstractGeoPoint|null $geo
     * @param AbstractInputBotInlineMessageID|null $msgId
     */
    public function __construct(
        public readonly int $userId,
        public readonly string $query,
        public readonly string $id,
        public readonly ?AbstractGeoPoint $geo = null,
        public readonly ?AbstractInputBotInlineMessageID $msgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->msgId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->query);
        if ($flags & (1 << 0)) {
            $buffer .= $this->geo->serialize();
        }
        $buffer .= Serializer::bytes($this->id);
        if ($flags & (1 << 1)) {
            $buffer .= $this->msgId->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $query = Deserializer::bytes($__payload, $__offset);
        $geo = (($flags & (1 << 0)) !== 0) ? AbstractGeoPoint::deserialize($__payload, $__offset) : null;
        $id = Deserializer::bytes($__payload, $__offset);
        $msgId = (($flags & (1 << 1)) !== 0) ? AbstractInputBotInlineMessageID::deserialize($__payload, $__offset) : null;

        return new self(
            $userId,
            $query,
            $id,
            $geo,
            $msgId
        );
    }
}