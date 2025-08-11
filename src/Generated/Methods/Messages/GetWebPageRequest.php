<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\WebPage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getWebPage
 */
final class GetWebPageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8d9692a3;
    
    public string $_ = 'messages.getWebPage';
    
    public function getMethodName(): string
    {
        return 'messages.getWebPage';
    }
    
    public function getResponseClass(): string
    {
        return WebPage::class;
    }
    /**
     * @param string $url
     * @param int $hash
     */
    public function __construct(
        public readonly string $url,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}