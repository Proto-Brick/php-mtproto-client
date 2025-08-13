<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/UrlAuthResult
 */
abstract class AbstractUrlAuthResult extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x92d33a0e => UrlAuthResultRequest::deserialize($stream),
            0x8f8c0e4e => UrlAuthResultAccepted::deserialize($stream),
            0xa9d6db1f => UrlAuthResultDefault::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type UrlAuthResult. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}