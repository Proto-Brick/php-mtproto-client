<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractResolvedBusinessChatLinks;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.resolveBusinessChatLink
 */
final class ResolveBusinessChatLinkRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1418913262;
    
    public string $_ = 'account.resolveBusinessChatLink';
    
    public function getMethodName(): string
    {
        return 'account.resolveBusinessChatLink';
    }
    
    public function getResponseClass(): string
    {
        return AbstractResolvedBusinessChatLinks::class;
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