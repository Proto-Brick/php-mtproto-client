<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getPaidReactionPrivacy
 */
final class GetPaidReactionPrivacyRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1193563562;
    
    public string $_ = 'messages.getPaidReactionPrivacy';
    
    public function getMethodName(): string
    {
        return 'messages.getPaidReactionPrivacy';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
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