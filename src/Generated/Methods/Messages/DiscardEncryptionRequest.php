<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.discardEncryption
 */
final class DiscardEncryptionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf393aea0;
    
    public string $_ = 'messages.discardEncryption';
    
    public function getMethodName(): string
    {
        return 'messages.discardEncryption';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $chatId
     * @param bool|null $deleteHistory
     */
    public function __construct(
        public readonly int $chatId,
        public readonly ?bool $deleteHistory = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->deleteHistory) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->chatId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}