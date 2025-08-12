<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Contracts\TlObjectInterface;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/TopPeerCategory
 */
enum TopPeerCategory: int implements TlObjectInterface
{
    case TopPeerCategoryBotsPM = 0xab661b5b;
    case TopPeerCategoryBotsInline = 0x148677e2;
    case TopPeerCategoryCorrespondents = 0x637b7ed;
    case TopPeerCategoryGroups = 0xbd17a14a;
    case TopPeerCategoryChannels = 0x161d9628;
    case TopPeerCategoryPhoneCalls = 0x1e76a78c;
    case TopPeerCategoryForwardUsers = 0xa8406ca9;
    case TopPeerCategoryForwardChats = 0xfbeec0f0;
    case TopPeerCategoryBotsApp = 0xfd9e7bec;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        try {
            return self::from($constructorId);
        } catch (\ValueError $e) {
            throw new RuntimeException(sprintf(
                'Unknown constructor ID for enum %s. Received ID: 0x%s (signed: %d)',
                self::class,
                dechex(unpack('V', pack('l', $constructorId))[1]),
                $constructorId
            ), 0, $e);
        }
    }
    
    public function getConstructorId(): int
    {
        return $this->value;
    }
    
    public function getPredicate(): string
    {
        return match($this) {
            self::TopPeerCategoryBotsPM => 'topPeerCategoryBotsPM',
            self::TopPeerCategoryBotsInline => 'topPeerCategoryBotsInline',
            self::TopPeerCategoryCorrespondents => 'topPeerCategoryCorrespondents',
            self::TopPeerCategoryGroups => 'topPeerCategoryGroups',
            self::TopPeerCategoryChannels => 'topPeerCategoryChannels',
            self::TopPeerCategoryPhoneCalls => 'topPeerCategoryPhoneCalls',
            self::TopPeerCategoryForwardUsers => 'topPeerCategoryForwardUsers',
            self::TopPeerCategoryForwardChats => 'topPeerCategoryForwardChats',
            self::TopPeerCategoryBotsApp => 'topPeerCategoryBotsApp',
        };
    }
}