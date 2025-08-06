<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.savedRingtoneConverted
 */
final class SavedRingtoneConverted extends AbstractSavedRingtone
{
    public const CONSTRUCTOR_ID = 0x1f307eb7;
    
    public string $_ = 'account.savedRingtoneConverted';
    
    /**
     * @param AbstractDocument $document
     */
    public function __construct(
        public readonly AbstractDocument $document
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->document->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $document = AbstractDocument::deserialize($deserializer, $stream);
        return new self(
            $document
        );
    }
}