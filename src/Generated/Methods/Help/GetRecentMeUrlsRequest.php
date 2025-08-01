<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractRecentMeUrls;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getRecentMeUrls
 */
final class GetRecentMeUrlsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1036054804;
    
    public string $_ = 'help.getRecentMeUrls';
    
    public function getMethodName(): string
    {
        return 'help.getRecentMeUrls';
    }
    
    public function getResponseClass(): string
    {
        return AbstractRecentMeUrls::class;
    }
    /**
     * @param string $referer
     */
    public function __construct(
        public readonly string $referer
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->referer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}