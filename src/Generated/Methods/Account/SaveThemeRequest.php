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
    public const CONSTRUCTOR_ID = 0xf257106c;
    
    public string $predicate = 'account.saveTheme';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->theme->serialize();
        $buffer .= ($this->unsave ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}