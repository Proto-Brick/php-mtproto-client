<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBaseTheme;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputTheme;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.installTheme
 */
final class InstallThemeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc727bb3b;
    
    public string $_ = 'account.installTheme';
    
    public function getMethodName(): string
    {
        return 'account.installTheme';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool|null $dark
     * @param AbstractInputTheme|null $theme
     * @param string|null $format
     * @param AbstractBaseTheme|null $baseTheme
     */
    public function __construct(
        public readonly ?bool $dark = null,
        public readonly ?AbstractInputTheme $theme = null,
        public readonly ?string $format = null,
        public readonly ?AbstractBaseTheme $baseTheme = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) $flags |= (1 << 0);
        if ($this->theme !== null) $flags |= (1 << 1);
        if ($this->format !== null) $flags |= (1 << 2);
        if ($this->baseTheme !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $this->theme->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->format);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->baseTheme->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}