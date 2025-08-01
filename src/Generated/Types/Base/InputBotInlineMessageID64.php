<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageID64
 */
final class InputBotInlineMessageID64 extends AbstractInputBotInlineMessageID
{
    public const CONSTRUCTOR_ID = 3067680215;
    
    public string $_ = 'inputBotInlineMessageID64';
    
    /**
     * @param int $dcId
     * @param int $ownerId
     * @param int $id
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $dcId,
        public readonly int $ownerId,
        public readonly int $id,
        public readonly int $accessHash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->dcId);
        $buffer .= $serializer->int64($this->ownerId);
        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $dcId = $deserializer->int32($stream);
        $ownerId = $deserializer->int64($stream);
        $id = $deserializer->int32($stream);
        $accessHash = $deserializer->int64($stream);
            return new self(
            $dcId,
            $ownerId,
            $id,
            $accessHash
        );
    }
}