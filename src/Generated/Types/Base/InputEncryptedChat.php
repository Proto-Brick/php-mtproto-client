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
    
    public string $_ = 'inputEncryptedChat';
    
    /**
     * @param int $chatId
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $accessHash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->chatId);
        $buffer .= $serializer->int64($this->accessHash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $chatId = $deserializer->int32($stream);
        $accessHash = $deserializer->int64($stream);
        return new self(
            $chatId,
            $accessHash
        );
    }
}