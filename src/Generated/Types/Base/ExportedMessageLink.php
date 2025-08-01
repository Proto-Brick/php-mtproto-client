<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/exportedMessageLink
 */
final class ExportedMessageLink extends AbstractExportedMessageLink
{
    public const CONSTRUCTOR_ID = 1571494644;
    
    public string $_ = 'exportedMessageLink';
    
    /**
     * @param string $link
     * @param string $html
     */
    public function __construct(
        public readonly string $link,
        public readonly string $html
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->link);
        $buffer .= $serializer->bytes($this->html);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $link = $deserializer->bytes($stream);
        $html = $deserializer->bytes($stream);
            return new self(
            $link,
            $html
        );
    }
}