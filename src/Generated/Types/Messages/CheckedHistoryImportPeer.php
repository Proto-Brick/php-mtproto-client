<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.checkedHistoryImportPeer
 */
final class CheckedHistoryImportPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa24de717;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $confirmText = $deserializer->bytes($stream);
        return new self(
            $confirmText
        );
    }
}