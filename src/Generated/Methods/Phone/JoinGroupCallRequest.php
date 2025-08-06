<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.joinGroupCall
 */
final class JoinGroupCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb132ff7b;
    
    public string $_ = 'phone.joinGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.joinGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputGroupCall $call
     * @param AbstractInputPeer $joinAs
     * @param array $params
     * @param bool|null $muted
     * @param bool|null $videoStopped
     * @param string|null $inviteHash
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly AbstractInputPeer $joinAs,
        public readonly array $params,
        public readonly ?bool $muted = null,
        public readonly ?bool $videoStopped = null,
        public readonly ?string $inviteHash = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->muted) $flags |= (1 << 0);
        if ($this->videoStopped) $flags |= (1 << 2);
        if ($this->inviteHash !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->call->serialize($serializer);
        $buffer .= $this->joinAs->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->inviteHash);
        }
        $buffer .= $serializer->bytes(json_encode($this->params, JSON_FORCE_OBJECT));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}