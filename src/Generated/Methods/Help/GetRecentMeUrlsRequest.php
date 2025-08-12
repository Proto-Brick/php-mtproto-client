<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\RecentMeUrls;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getRecentMeUrls
 */
final class GetRecentMeUrlsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3dc0f114;
    
    public string $predicate = 'help.getRecentMeUrls';
    
    public function getMethodName(): string
    {
        return 'help.getRecentMeUrls';
    }
    
    public function getResponseClass(): string
    {
        return RecentMeUrls::class;
    }
    /**
     * @param string $referer
     */
    public function __construct(
        public readonly string $referer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->referer);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}