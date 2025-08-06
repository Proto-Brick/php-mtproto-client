<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractDeepLinkInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getDeepLinkInfo
 */
final class GetDeepLinkInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3fedc75f;
    
    public string $_ = 'help.getDeepLinkInfo';
    
    public function getMethodName(): string
    {
        return 'help.getDeepLinkInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDeepLinkInfo::class;
    }
    /**
     * @param string $path
     */
    public function __construct(
        public readonly string $path
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->path);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}