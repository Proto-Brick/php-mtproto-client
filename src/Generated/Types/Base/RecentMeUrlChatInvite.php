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
    
    public string $predicate = 'recentMeUrlChatInvite';
    
    /**
     * @param string $url
     * @param AbstractChatInvite $chatInvite
     */
    public function __construct(
        public readonly string $url,
        public readonly AbstractChatInvite $chatInvite
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= $this->chatInvite->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $url = Deserializer::bytes($stream);
        $chatInvite = AbstractChatInvite::deserialize($stream);

        return new self(
            $url,
            $chatInvite
        );
    }
}