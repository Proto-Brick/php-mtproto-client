<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\ContactStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.getStatuses
 */
final class GetStatusesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc4a353ee;
    
    public string $_ = 'contacts.getStatuses';
    
    public function getMethodName(): string
    {
        return 'contacts.getStatuses';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . ContactStatus::class . '>';
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