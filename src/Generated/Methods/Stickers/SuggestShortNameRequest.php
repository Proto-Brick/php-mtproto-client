<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stickers;

use DigitalStars\MtprotoClient\Generated\Types\Stickers\AbstractSuggestedShortName;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stickers.suggestShortName
 */
final class SuggestShortNameRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1303364867;
    
    public string $_ = 'stickers.suggestShortName';
    
    public function getMethodName(): string
    {
        return 'stickers.suggestShortName';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSuggestedShortName::class;
    }
    /**
     * @param string $title
     */
    public function __construct(
        public readonly string $title
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->title);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}