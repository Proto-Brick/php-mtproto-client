<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.searchPosts
 */
final class SearchPostsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd19f987b;
    
    public string $_ = 'channels.searchPosts';
    
    public function getMethodName(): string
    {
        return 'channels.searchPosts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param string $hashtag
     * @param int $offsetRate
     * @param AbstractInputPeer $offsetPeer
     * @param int $offsetId
     * @param int $limit
     */
    public function __construct(
        public readonly string $hashtag,
        public readonly int $offsetRate,
        public readonly AbstractInputPeer $offsetPeer,
        public readonly int $offsetId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->hashtag);
        $buffer .= Serializer::int32($this->offsetRate);
        $buffer .= $this->offsetPeer->serialize();
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}