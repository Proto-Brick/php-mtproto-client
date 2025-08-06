<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/encryptedChatDiscarded
 */
final class EncryptedChatDiscarded extends AbstractEncryptedChat
{
    public const CONSTRUCTOR_ID = 0x1e1c7c45;
    
    public string $_ = 'encryptedChatDiscarded';
    
    /**
     * @param int $id
     * @param bool|null $historyDeleted
     */
    public function __construct(
        public readonly int $id,
        public readonly ?bool $historyDeleted = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->historyDeleted) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $historyDeleted = ($flags & (1 << 0)) ? true : null;
        $id = $deserializer->int32($stream);
        return new self(
            $id,
            $historyDeleted
        );
    }
}