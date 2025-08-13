<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.clickSponsoredMessage
 */
final class ClickSponsoredMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8235057e;
    
    public string $predicate = 'messages.clickSponsoredMessage';
    
    public function getMethodName(): string
    {
        return 'messages.clickSponsoredMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $randomId
     * @param true|null $media
     * @param true|null $fullscreen
     */
    public function __construct(
        public readonly string $randomId,
        public readonly ?true $media = null,
        public readonly ?true $fullscreen = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->media) $flags |= (1 << 0);
        if ($this->fullscreen) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->randomId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}