<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/TopPeerCategory
 */
abstract class AbstractTopPeerCategory extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            TopPeerCategoryBotsPM::CONSTRUCTOR_ID => TopPeerCategoryBotsPM::deserialize($deserializer, $stream),
            TopPeerCategoryBotsInline::CONSTRUCTOR_ID => TopPeerCategoryBotsInline::deserialize($deserializer, $stream),
            TopPeerCategoryCorrespondents::CONSTRUCTOR_ID => TopPeerCategoryCorrespondents::deserialize($deserializer, $stream),
            TopPeerCategoryGroups::CONSTRUCTOR_ID => TopPeerCategoryGroups::deserialize($deserializer, $stream),
            TopPeerCategoryChannels::CONSTRUCTOR_ID => TopPeerCategoryChannels::deserialize($deserializer, $stream),
            TopPeerCategoryPhoneCalls::CONSTRUCTOR_ID => TopPeerCategoryPhoneCalls::deserialize($deserializer, $stream),
            TopPeerCategoryForwardUsers::CONSTRUCTOR_ID => TopPeerCategoryForwardUsers::deserialize($deserializer, $stream),
            TopPeerCategoryForwardChats::CONSTRUCTOR_ID => TopPeerCategoryForwardChats::deserialize($deserializer, $stream),
            TopPeerCategoryBotsApp::CONSTRUCTOR_ID => TopPeerCategoryBotsApp::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type TopPeerCategory: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}