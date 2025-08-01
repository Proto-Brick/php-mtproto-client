<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.deleteBusinessChatLink
 */
final class DeleteBusinessChatLinkRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1611085428;
    
    public string $_ = 'account.deleteBusinessChatLink';
    
    public function getMethodName(): string
    {
        return 'account.deleteBusinessChatLink';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $slug
     */
    public function __construct(
        public readonly string $slug
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->slug);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}