<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sendAsPeer
 */
final class SendAsPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb81c7034;
    
    public string $predicate = 'sendAsPeer';
    
    /**
     * @param AbstractPeer $peer
     * @param true|null $premiumRequired
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ?true $premiumRequired = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premiumRequired) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $premiumRequired = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractPeer::deserialize($stream);

        return new self(
            $peer,
            $premiumRequired
        );
    }
}