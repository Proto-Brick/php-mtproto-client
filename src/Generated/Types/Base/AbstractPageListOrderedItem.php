<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PageListOrderedItem
 */
abstract class AbstractPageListOrderedItem extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PageListOrderedItemText::CONSTRUCTOR_ID => PageListOrderedItemText::deserialize($deserializer, $stream),
            PageListOrderedItemBlocks::CONSTRUCTOR_ID => PageListOrderedItemBlocks::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type PageListOrderedItem: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}