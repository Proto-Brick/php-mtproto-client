<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Smsjobs;

use DigitalStars\MtprotoClient\Generated\Types\Smsjobs\EligibilityToJoin;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/smsjobs.isEligibleToJoin
 */
final class IsEligibleToJoinRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xedc39d0;
    
    public string $_ = 'smsjobs.isEligibleToJoin';
    
    public function getMethodName(): string
    {
        return 'smsjobs.isEligibleToJoin';
    }
    
    public function getResponseClass(): string
    {
        return EligibilityToJoin::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}