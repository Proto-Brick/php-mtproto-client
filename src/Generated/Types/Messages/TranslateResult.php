<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractTextWithEntities;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.translateResult
 */
final class TranslateResult extends AbstractTranslatedText
{
    public const CONSTRUCTOR_ID = 870003448;
    
    public string $_ = 'messages.translateResult';
    
    /**
     * @param list<AbstractTextWithEntities> $result
     */
    public function __construct(
        public readonly array $result
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->result);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $result = $deserializer->vectorOfObjects($stream, [AbstractTextWithEntities::class, 'deserialize']);
            return new self(
            $result
        );
    }
}