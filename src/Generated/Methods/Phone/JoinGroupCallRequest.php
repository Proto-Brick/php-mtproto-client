<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
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
    
    public string $predicate = 'phone.joinGroupCall';
    
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
     * @param true|null $muted
     * @param true|null $videoStopped
     * @param string|null $inviteHash
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly AbstractInputPeer $joinAs,
        public readonly array $params,
        public readonly ?true $muted = null,
        public readonly ?true $videoStopped = null,
        public readonly ?string $inviteHash = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->muted) $flags |= (1 << 0);
        if ($this->videoStopped) $flags |= (1 << 2);
        if ($this->inviteHash !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= $this->joinAs->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->inviteHash);
        }
        $buffer .= Serializer::serializeDataJSON($this->params);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}