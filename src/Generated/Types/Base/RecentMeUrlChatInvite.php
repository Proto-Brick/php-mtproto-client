<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $url = Deserializer::bytes($__payload, $__offset);
        $chatInvite = AbstractChatInvite::deserialize($__payload, $__offset);

        return new self(
            $url,
            $chatInvite
        );
    }
}