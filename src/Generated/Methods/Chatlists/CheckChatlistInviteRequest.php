<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Chatlists\AbstractChatlistInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.checkChatlistInvite
 */
final class CheckChatlistInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x41c10fff;
    
    public string $_ = 'chatlists.checkChatlistInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.checkChatlistInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChatlistInvite::class;
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