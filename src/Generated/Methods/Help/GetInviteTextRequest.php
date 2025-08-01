<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractInviteText;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getInviteText
 */
final class GetInviteTextRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1295590211;
    
    public string $_ = 'help.getInviteText';
    
    public function getMethodName(): string
    {
        return 'help.getInviteText';
    }
    
    public function getResponseClass(): string
    {
        return AbstractInviteText::class;
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