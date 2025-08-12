<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setDefaultReaction
 */
final class SetDefaultReactionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4f47a016;
    
    public string $predicate = 'messages.setDefaultReaction';
    
    public function getMethodName(): string
    {
        return 'messages.setDefaultReaction';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractReaction $reaction
     */
    public function __construct(
        public readonly AbstractReaction $reaction
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->reaction->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}