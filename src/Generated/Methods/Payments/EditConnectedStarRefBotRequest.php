<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractConnectedStarRefBots;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.editConnectedStarRefBot
 */
final class EditConnectedStarRefBotRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3841762467;
    
    public string $_ = 'payments.editConnectedStarRefBot';
    
    public function getMethodName(): string
    {
        return 'payments.editConnectedStarRefBot';
    }
    
    public function getResponseClass(): string
    {
        return AbstractConnectedStarRefBots::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $link
     * @param bool|null $revoked
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $link,
        public readonly ?bool $revoked = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoked) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->link);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}