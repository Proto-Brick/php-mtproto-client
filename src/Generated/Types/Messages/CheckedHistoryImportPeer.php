<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.checkedHistoryImportPeer
 */
final class CheckedHistoryImportPeer extends AbstractCheckedHistoryImportPeer
{
    public const CONSTRUCTOR_ID = 2723014423;
    
    public string $_ = 'messages.checkedHistoryImportPeer';
    
    /**
     * @param string $confirmText
     */
    public function __construct(
        public readonly string $confirmText
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->confirmText);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $confirmText = $deserializer->bytes($stream);
            return new self(
            $confirmText
        );
    }
}