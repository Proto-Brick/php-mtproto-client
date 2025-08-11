<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stickers;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stickers.checkShortName
 */
final class CheckShortNameRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x284b3639;
    
    public string $_ = 'stickers.checkShortName';
    
    public function getMethodName(): string
    {
        return 'stickers.checkShortName';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $shortName
     */
    public function __construct(
        public readonly string $shortName
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->shortName);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}