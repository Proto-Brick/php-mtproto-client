<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBusinessChatLink;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBusinessChatLink;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.createBusinessChatLink
 */
final class CreateBusinessChatLinkRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2287068814;
    
    public string $_ = 'account.createBusinessChatLink';
    
    public function getMethodName(): string
    {
        return 'account.createBusinessChatLink';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBusinessChatLink::class;
    }
    /**
     * @param AbstractInputBusinessChatLink $link
     */
    public function __construct(
        public readonly AbstractInputBusinessChatLink $link
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->link->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}