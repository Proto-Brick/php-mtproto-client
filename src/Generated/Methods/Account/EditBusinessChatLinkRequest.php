<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\BusinessChatLink;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessChatLink;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.editBusinessChatLink
 */
final class EditBusinessChatLinkRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8c3410af;
    
    public string $_ = 'account.editBusinessChatLink';
    
    public function getMethodName(): string
    {
        return 'account.editBusinessChatLink';
    }
    
    public function getResponseClass(): string
    {
        return BusinessChatLink::class;
    }
    /**
     * @param string $slug
     * @param InputBusinessChatLink $link
     */
    public function __construct(
        public readonly string $slug,
        public readonly InputBusinessChatLink $link
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->slug);
        $buffer .= $this->link->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}