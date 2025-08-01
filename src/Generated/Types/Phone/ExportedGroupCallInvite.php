<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phone.exportedGroupCallInvite
 */
final class ExportedGroupCallInvite extends AbstractExportedGroupCallInvite
{
    public const CONSTRUCTOR_ID = 541839704;
    
    public string $_ = 'phone.exportedGroupCallInvite';
    
    /**
     * @param string $link
     */
    public function __construct(
        public readonly string $link
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->link);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $link = $deserializer->bytes($stream);
            return new self(
            $link
        );
    }
}