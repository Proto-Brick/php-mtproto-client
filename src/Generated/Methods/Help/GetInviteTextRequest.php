<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\InviteText;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getInviteText
 */
final class GetInviteTextRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4d392343;
    
    public string $_ = 'help.getInviteText';
    
    public function getMethodName(): string
    {
        return 'help.getInviteText';
    }
    
    public function getResponseClass(): string
    {
        return InviteText::class;
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