<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.botPreparedInlineMessage
 */
final class BotPreparedInlineMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8ecf0511;
    
    public string $predicate = 'messages.botPreparedInlineMessage';
    
    /**
     * @param string $id
     * @param int $expireDate
     */
    public function __construct(
        public readonly string $id,
        public readonly int $expireDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::int32($this->expireDate);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::bytes($stream);
        $expireDate = Deserializer::int32($stream);

        return new self(
            $id,
            $expireDate
        );
    }
}