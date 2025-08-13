<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webPageAttributeTheme
 */
final class WebPageAttributeTheme extends AbstractWebPageAttribute
{
    public const CONSTRUCTOR_ID = 0x54b56617;
    
    public string $predicate = 'webPageAttributeTheme';
    
    /**
     * @param list<AbstractDocument>|null $documents
     * @param ThemeSettings|null $settings
     */
    public function __construct(
        public readonly ?array $documents = null,
        public readonly ?ThemeSettings $settings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->documents !== null) {
            $flags |= (1 << 0);
        }
        if ($this->settings !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->documents);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->settings->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $documents = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']) : null;
        $settings = (($flags & (1 << 1)) !== 0) ? ThemeSettings::deserialize($stream) : null;

        return new self(
            $documents,
            $settings
        );
    }
}