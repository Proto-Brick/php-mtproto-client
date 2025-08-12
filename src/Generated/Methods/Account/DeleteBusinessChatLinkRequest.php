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
    public const CONSTRUCTOR_ID = 0x60073674;
    
    public string $predicate = 'account.deleteBusinessChatLink';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}