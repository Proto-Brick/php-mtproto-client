<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUrlAuthResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.requestUrlAuth
 */
final class RequestUrlAuthRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x198fb446;
    
    public string $_ = 'messages.requestUrlAuth';
    
    public function getMethodName(): string
    {
        return 'messages.requestUrlAuth';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUrlAuthResult::class;
    }
    /**
     * @param AbstractInputPeer|null $peer
     * @param int|null $msgId
     * @param int|null $buttonId
     * @param string|null $url
     */
    public function __construct(
        public readonly ?AbstractInputPeer $peer = null,
        public readonly ?int $msgId = null,
        public readonly ?int $buttonId = null,
        public readonly ?string $url = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peer !== null) $flags |= (1 << 1);
        if ($this->msgId !== null) $flags |= (1 << 1);
        if ($this->buttonId !== null) $flags |= (1 << 1);
        if ($this->url !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $this->peer->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->msgId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->buttonId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->url);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}