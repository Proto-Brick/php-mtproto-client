<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputTheme;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractTheme;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getTheme
 */
final class GetThemeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 978872812;
    
    public string $_ = 'account.getTheme';
    
    public function getMethodName(): string
    {
        return 'account.getTheme';
    }
    
    public function getResponseClass(): string
    {
        return AbstractTheme::class;
    }
    /**
     * @param string $format
     * @param AbstractInputTheme $theme
     */
    public function __construct(
        public readonly string $format,
        public readonly AbstractInputTheme $theme
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->format);
        $buffer .= $this->theme->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}