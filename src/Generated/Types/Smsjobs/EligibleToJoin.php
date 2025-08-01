<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Smsjobs;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/smsjobs.eligibleToJoin
 */
final class EligibleToJoin extends AbstractEligibilityToJoin
{
    public const CONSTRUCTOR_ID = 3700114639;
    
    public string $_ = 'smsjobs.eligibleToJoin';
    
    /**
     * @param string $termsUrl
     * @param int $monthlySentSms
     */
    public function __construct(
        public readonly string $termsUrl,
        public readonly int $monthlySentSms
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->termsUrl);
        $buffer .= $serializer->int32($this->monthlySentSms);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $termsUrl = $deserializer->bytes($stream);
        $monthlySentSms = $deserializer->int32($stream);
            return new self(
            $termsUrl,
            $monthlySentSms
        );
    }
}