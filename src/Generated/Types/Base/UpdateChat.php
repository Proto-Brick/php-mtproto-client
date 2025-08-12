<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChat
 */
final class UpdateChat extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf89a6a4e;
    
    public string $predicate = 'updateChat';
    
    /**
     * @param int $chatId
     */
    public function __construct(
        public readonly int $chatId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $chatId = Deserializer::int64($stream);

        return new self(
            $chatId
        );
    }
}