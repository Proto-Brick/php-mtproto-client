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
    public const CONSTRUCTOR_ID = 0xb6d915d7;
    
    public string $predicate = 'inputBotInlineMessageID64';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::int64($this->ownerId);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->accessHash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $dcId = Deserializer::int32($stream);
        $ownerId = Deserializer::int64($stream);
        $id = Deserializer::int32($stream);
        $accessHash = Deserializer::int64($stream);

        return new self(
            $dcId,
            $ownerId,
            $id,
            $accessHash
        );
    }
}