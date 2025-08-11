<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getNotifyExceptions
 */
final class GetNotifyExceptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x53577479;
    
    public string $_ = 'account.getNotifyExceptions';
    
    public function getMethodName(): string
    {
        return 'account.getNotifyExceptions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param bool|null $compareSound
     * @param bool|null $compareStories
     * @param AbstractInputNotifyPeer|null $peer
     */
    public function __construct(
        public readonly ?bool $compareSound = null,
        public readonly ?bool $compareStories = null,
        public readonly ?AbstractInputNotifyPeer $peer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->compareSound) $flags |= (1 << 1);
        if ($this->compareStories) $flags |= (1 << 2);
        if ($this->peer !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->peer->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}