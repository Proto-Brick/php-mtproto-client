<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputThemeSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractTheme;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.createTheme
 */
final class CreateThemeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1697530880;
    
    public string $_ = 'account.createTheme';
    
    public function getMethodName(): string
    {
        return 'account.createTheme';
    }
    
    public function getResponseClass(): string
    {
        return AbstractTheme::class;
    }
    /**
     * @param string $slug
     * @param string $title
     * @param AbstractInputDocument|null $document
     * @param list<AbstractInputThemeSettings>|null $settings
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $title,
        public readonly ?AbstractInputDocument $document = null,
        public readonly ?array $settings = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->document !== null) $flags |= (1 << 2);
        if ($this->settings !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->slug);
        $buffer .= $serializer->bytes($this->title);
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