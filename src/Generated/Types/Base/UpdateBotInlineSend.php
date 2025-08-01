<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotInlineSend
 */
final class UpdateBotInlineSend extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 317794823;
    
    public string $_ = 'updateBotInlineSend';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geo !== null) $flags |= (1 << 0);
        if ($this->msgId !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->bytes($this->query);
        if ($flags & (1 << 0)) {
            $buffer .= $this->geo->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->id);
        if ($flags & (1 << 1)) {
            $buffer .= $this->msgId->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $userId = $deserializer->int64($stream);
        $query = $deserializer->bytes($stream);
        $geo = ($flags & (1 << 0)) ? AbstractGeoPoint::deserialize($deserializer, $stream) : null;
        $id = $deserializer->bytes($stream);
        $msgId = ($flags & (1 << 1)) ? AbstractInputBotInlineMessageID::deserialize($deserializer, $stream) : null;
            return new self(
            $userId,
            $query,
            $id,
            $geo,
            $msgId
        );
    }
}