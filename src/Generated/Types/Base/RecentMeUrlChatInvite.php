<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/recentMeUrlChatInvite
 */
final class RecentMeUrlChatInvite extends AbstractRecentMeUrl
{
    public const CONSTRUCTOR_ID = 0xeb49081d;
    
    public string $_ = 'recentMeUrlChatInvite';
    
    /**
     * @param string $url
     * @param AbstractChatInvite $chatInvite
     */
    public function __construct(
        public readonly string $url,
        public readonly AbstractChatInvite $chatInvite
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $this->chatInvite->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $chatInvite = AbstractChatInvite::deserialize($deserializer, $stream);
        return new self(
            $url,
            $chatInvite
        );
    }
}