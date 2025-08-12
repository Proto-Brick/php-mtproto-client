<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.dialogsNotModified
 */
final class DialogsNotModified extends AbstractDialogs
{
    public const CONSTRUCTOR_ID = 0xf0e3e596;
    
    public string $predicate = 'messages.dialogsNotModified';
    
    /**
     * @param int $count
     */
    public function __construct(
        public readonly int $count
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $count = Deserializer::int32($stream);

        return new self(
            $count
        );
    }
}