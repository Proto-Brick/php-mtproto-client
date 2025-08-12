<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputEncryptedChat
 */
final class InputEncryptedChat extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf141b5e1;
    
    public string $predicate = 'inputEncryptedChat';
    
    /**
     * @param int $chatId
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->chatId);
        $buffer .= Serializer::int64($this->accessHash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $chatId = Deserializer::int32($stream);
        $accessHash = Deserializer::int64($stream);

        return new self(
            $chatId,
            $accessHash
        );
    }
}