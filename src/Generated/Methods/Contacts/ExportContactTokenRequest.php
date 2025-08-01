<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractExportedContactToken;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.exportContactToken
 */
final class ExportContactTokenRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 4167385127;
    
    public string $_ = 'contacts.exportContactToken';
    
    public function getMethodName(): string
    {
        return 'contacts.exportContactToken';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedContactToken::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}