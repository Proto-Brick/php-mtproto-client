<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.updateSavedReactionTag
 */
final class UpdateSavedReactionTagRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x60297dec;
    
    public string $_ = 'messages.updateSavedReactionTag';
    
    public function getMethodName(): string
    {
        return 'messages.updateSavedReactionTag';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractReaction $reaction
     * @param string|null $title
     */
    public function __construct(
        public readonly AbstractReaction $reaction,
        public readonly ?string $title = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->reaction->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->title);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}