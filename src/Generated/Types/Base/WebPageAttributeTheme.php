<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webPageAttributeTheme
 */
final class WebPageAttributeTheme extends AbstractWebPageAttribute
{
    public const CONSTRUCTOR_ID = 0x54b56617;
    
    public string $_ = 'webPageAttributeTheme';
    
    /**
     * @param list<AbstractDocument>|null $documents
     * @param ThemeSettings|null $settings
     */
    public function __construct(
        public readonly ?array $documents = null,
        public readonly ?ThemeSettings $settings = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->documents !== null) $flags |= (1 << 0);
        if ($this->settings !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->documents);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->settings->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $documents = ($flags & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']) : null;
        $settings = ($flags & (1 << 1)) ? ThemeSettings::deserialize($deserializer, $stream) : null;
        return new self(
            $documents,
            $settings
        );
    }
}