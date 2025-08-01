<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractWebPage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getWebPage
 */
final class GetWebPageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2375455395;
    
    public string $_ = 'messages.getWebPage';
    
    public function getMethodName(): string
    {
        return 'messages.getWebPage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWebPage::class;
    }
    /**
     * @param string $url
     * @param int $hash
     */
    public function __construct(
        public readonly string $url,
        public readonly int $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int32($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}