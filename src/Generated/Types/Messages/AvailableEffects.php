<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AvailableEffect;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.availableEffects
 */
final class AvailableEffects extends AbstractAvailableEffects
{
    public const CONSTRUCTOR_ID = 0xbddb616e;
    
    public string $_ = 'messages.availableEffects';
    
    /**
     * @param int $hash
     * @param list<AvailableEffect> $effects
     * @param list<AbstractDocument> $documents
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $effects,
        public readonly array $documents
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->effects);
        $buffer .= $serializer->vectorOfObjects($this->documents);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int32($stream);
        $effects = $deserializer->vectorOfObjects($stream, [AvailableEffect::class, 'deserialize']);
        $documents = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        return new self(
            $hash,
            $effects,
            $documents
        );
    }
}