<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageID
 */
final class InputBotInlineMessageID extends AbstractInputBotInlineMessageID
{
    public const CONSTRUCTOR_ID = 0x890c3d89;
    
    public string $predicate = 'inputBotInlineMessageID';
    
    /**
     * @param int $dcId
     * @param int $id
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $dcId,
        public readonly int $id,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $dcId = Deserializer::int32($stream);
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);

        return new self(
            $dcId,
            $id,
            $accessHash
        );
    }
}