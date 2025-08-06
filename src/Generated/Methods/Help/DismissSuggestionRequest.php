<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.dismissSuggestion
 */
final class DismissSuggestionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf50dbaa1;
    
    public string $_ = 'help.dismissSuggestion';
    
    public function getMethodName(): string
    {
        return 'help.dismissSuggestion';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $suggestion
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $suggestion
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->suggestion);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}