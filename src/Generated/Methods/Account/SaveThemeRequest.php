<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputTheme;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveTheme
 */
final class SaveThemeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 4065792108;
    
    public string $_ = 'account.saveTheme';
    
    public function getMethodName(): string
    {
        return 'account.saveTheme';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputTheme $theme
     * @param bool $unsave
     */
    public function __construct(
        public readonly AbstractInputTheme $theme,
        public readonly bool $unsave
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->theme->serialize($serializer);
        $buffer .= ($this->unsave ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}