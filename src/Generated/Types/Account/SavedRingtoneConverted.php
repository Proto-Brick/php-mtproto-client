<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/account.savedRingtoneConverted
 */
final class SavedRingtoneConverted extends AbstractSavedRingtone
{
    public const CONSTRUCTOR_ID = 0x1f307eb7;
    
    public string $predicate = 'account.savedRingtoneConverted';
    
    /**
     * @param AbstractDocument $document
     */
    public function __construct(
        public readonly AbstractDocument $document
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->document->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $document = AbstractDocument::deserialize($stream);

        return new self(
            $document
        );
    }
}