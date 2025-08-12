<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/WebPage
 */
abstract class AbstractWebPage extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            WebPageEmpty::CONSTRUCTOR_ID => WebPageEmpty::deserialize($stream),
            WebPagePending::CONSTRUCTOR_ID => WebPagePending::deserialize($stream),
            WebPage::CONSTRUCTOR_ID => WebPage::deserialize($stream),
            WebPageNotModified::CONSTRUCTOR_ID => WebPageNotModified::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type WebPage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}