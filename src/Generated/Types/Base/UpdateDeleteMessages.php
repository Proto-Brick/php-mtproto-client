<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDeleteMessages
 */
final class UpdateDeleteMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa20db0e5;
    
    public string $predicate = 'updateDeleteMessages';
    
    /**
     * @param list<int> $messages
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly array $messages,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfInts($this->messages);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $messages = Deserializer::vectorOfInts($stream);
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);

        return new self(
            $messages,
            $pts,
            $ptsCount
        );
    }
}