<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputTheme;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputThemeSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\Theme;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateTheme
 */
final class UpdateThemeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2bf40ccc;
    
    public string $_ = 'account.updateTheme';
    
    public function getMethodName(): string
    {
        return 'account.updateTheme';
    }
    
    public function getResponseClass(): string
    {
        return Theme::class;
    }
    /**
     * @param string $format
     * @param AbstractInputTheme $theme
     * @param string|null $slug
     * @param string|null $title
     * @param AbstractInputDocument|null $document
     * @param list<InputThemeSettings>|null $settings
     */
    public function __construct(
        public readonly string $format,
        public readonly AbstractInputTheme $theme,
        public readonly ?string $slug = null,
        public readonly ?string $title = null,
        public readonly ?AbstractInputDocument $document = null,
        public readonly ?array $settings = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->slug !== null) $flags |= (1 << 0);
        if ($this->title !== null) $flags |= (1 << 1);
        if ($this->document !== null) $flags |= (1 << 2);
        if ($this->settings !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->format);
        $buffer .= $this->theme->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->slug);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->document->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->settings);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}