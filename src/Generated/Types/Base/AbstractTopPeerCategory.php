<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/TopPeerCategory
 */
abstract class AbstractTopPeerCategory extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            TopPeerCategoryBotsPM::CONSTRUCTOR_ID => TopPeerCategoryBotsPM::deserialize($stream),
            TopPeerCategoryBotsInline::CONSTRUCTOR_ID => TopPeerCategoryBotsInline::deserialize($stream),
            TopPeerCategoryCorrespondents::CONSTRUCTOR_ID => TopPeerCategoryCorrespondents::deserialize($stream),
            TopPeerCategoryGroups::CONSTRUCTOR_ID => TopPeerCategoryGroups::deserialize($stream),
            TopPeerCategoryChannels::CONSTRUCTOR_ID => TopPeerCategoryChannels::deserialize($stream),
            TopPeerCategoryPhoneCalls::CONSTRUCTOR_ID => TopPeerCategoryPhoneCalls::deserialize($stream),
            TopPeerCategoryForwardUsers::CONSTRUCTOR_ID => TopPeerCategoryForwardUsers::deserialize($stream),
            TopPeerCategoryForwardChats::CONSTRUCTOR_ID => TopPeerCategoryForwardChats::deserialize($stream),
            TopPeerCategoryBotsApp::CONSTRUCTOR_ID => TopPeerCategoryBotsApp::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type TopPeerCategory. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}