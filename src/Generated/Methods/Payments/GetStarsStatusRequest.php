<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsStatus
 */
final class GetStarsStatusRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4ea9b3bf;
    
    public string $predicate = 'payments.getStarsStatus';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsStatus';
    }
    
    public function getResponseClass(): string
    {
        return StarsStatus::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $ton
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $ton = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ton) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}