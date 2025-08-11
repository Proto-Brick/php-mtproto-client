<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\SavedContact;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.getSaved
 */
final class GetSavedRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x82f1e39f;
    
    public string $_ = 'contacts.getSaved';
    
    public function getMethodName(): string
    {
        return 'contacts.getSaved';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . SavedContact::class . '>';
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