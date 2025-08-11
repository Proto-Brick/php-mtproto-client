<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/searchResultPosition
 */
final class SearchResultsPosition extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7f648b67;
    
    public string $_ = 'searchResultPosition';
    
    /**
     * @param int $msgId
     * @param int $date
     * @param int $offset
     */
    public function __construct(
        public readonly int $msgId,
        public readonly int $date,
        public readonly int $offset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->offset);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $msgId = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $offset = Deserializer::int32($stream);
        return new self(
            $msgId,
            $date,
            $offset
        );
    }
}