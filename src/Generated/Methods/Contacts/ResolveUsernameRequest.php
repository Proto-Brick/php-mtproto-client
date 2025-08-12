<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Contacts\ResolvedPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.resolveUsername
 */
final class ResolveUsernameRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x725afbbc;
    
    public string $predicate = 'contacts.resolveUsername';
    
    public function getMethodName(): string
    {
        return 'contacts.resolveUsername';
    }
    
    public function getResponseClass(): string
    {
        return ResolvedPeer::class;
    }
    /**
     * @param string $username
     * @param string|null $referer
     */
    public function __construct(
        public readonly string $username,
        public readonly ?string $referer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->referer !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->username);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->referer);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}