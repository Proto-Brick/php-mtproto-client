<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Premium;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Premium\BoostsList;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/premium.getBoostsList
 */
final class GetBoostsListRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x60f67660;
    
    public string $_ = 'premium.getBoostsList';
    
    public function getMethodName(): string
    {
        return 'premium.getBoostsList';
    }
    
    public function getResponseClass(): string
    {
        return BoostsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $gifts
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?bool $gifts = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gifts) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}