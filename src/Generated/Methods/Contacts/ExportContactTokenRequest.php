<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\ExportedContactToken;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.exportContactToken
 */
final class ExportContactTokenRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf8654027;
    
    public string $_ = 'contacts.exportContactToken';
    
    public function getMethodName(): string
    {
        return 'contacts.exportContactToken';
    }
    
    public function getResponseClass(): string
    {
        return ExportedContactToken::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}