<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSavedReactionTags;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSavedReactionTags
 */
final class GetSavedReactionTagsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3637e05b;
    
    public string $_ = 'messages.getSavedReactionTags';
    
    public function getMethodName(): string
    {
        return 'messages.getSavedReactionTags';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedReactionTags::class;
    }
    /**
     * @param int $hash
     * @param AbstractInputPeer|null $peer
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?AbstractInputPeer $peer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peer !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->peer->serialize();
        }
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}