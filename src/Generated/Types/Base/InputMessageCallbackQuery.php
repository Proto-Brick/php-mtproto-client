<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMessageCallbackQuery
 */
final class InputMessageCallbackQuery extends AbstractInputMessage
{
    public const CONSTRUCTOR_ID = 0xacfa1a7e;
    
    public string $_ = 'inputMessageCallbackQuery';
    
    /**
     * @param int $id
     * @param int $queryId
     */
    public function __construct(
        public readonly int $id,
        public readonly int $queryId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->queryId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $id = Deserializer::int32($stream);
        $queryId = Deserializer::int64($stream);
        return new self(
            $id,
            $queryId
        );
    }
}