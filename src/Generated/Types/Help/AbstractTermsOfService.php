<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/help.TermsOfService
 */
abstract class AbstractTermsOfService extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            TermsOfService::CONSTRUCTOR_ID => TermsOfService::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type help.TermsOfService: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}