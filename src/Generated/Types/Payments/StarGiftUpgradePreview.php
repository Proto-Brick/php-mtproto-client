<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarGiftAttribute;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.starGiftUpgradePreview
 */
final class StarGiftUpgradePreview extends TlObject
{
    public const CONSTRUCTOR_ID = 0x167bd90b;
    
    public string $predicate = 'payments.starGiftUpgradePreview';
    
    /**
     * @param list<AbstractStarGiftAttribute> $sampleAttributes
     */
    public function __construct(
        public readonly array $sampleAttributes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->sampleAttributes);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $sampleAttributes = Deserializer::vectorOfObjects($stream, [AbstractStarGiftAttribute::class, 'deserialize']);

        return new self(
            $sampleAttributes
        );
    }
}