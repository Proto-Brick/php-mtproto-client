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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        $query = Deserializer::bytes($stream);
        $geo = (($flags & (1 << 0)) !== 0) ? AbstractGeoPoint::deserialize($stream) : null;
        $id = Deserializer::bytes($stream);
        $msgId = (($flags & (1 << 1)) !== 0) ? AbstractInputBotInlineMessageID::deserialize($stream) : null;

        return new self(
            $userId,
            $query,
            $id,
            $geo,
            $msgId
        );
    }
}