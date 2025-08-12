<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.savedRingtones
 */
final class SavedRingtones extends AbstractSavedRingtones
{
    public const CONSTRUCTOR_ID = 0xc1e92cc5;
    
    public string $predicate = 'account.savedRingtones';
    
    /**
     * @param int $hash
     * @param list<AbstractDocument> $ringtones
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $ringtones
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->ringtones);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int64($stream);
        $ringtones = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);

        return new self(
            $hash,
            $ringtones
        );
    }
}