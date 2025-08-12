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
    
    public string $predicate = 'messages.checkedHistoryImportPeer';
    
    /**
     * @param string $confirmText
     */
    public function __construct(
        public readonly string $confirmText
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->confirmText);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $confirmText = Deserializer::bytes($stream);

        return new self(
            $confirmText
        );
    }
}