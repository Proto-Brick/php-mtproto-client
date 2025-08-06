<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallProtocol;
use DigitalStars\MtprotoClient\Generated\Types\Phone\PhoneCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.requestCall
 */
final class RequestCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x42ff96ed;
    
    public string $_ = 'phone.requestCall';
    
    public function getMethodName(): string
    {
        return 'phone.requestCall';
    }
    
    public function getResponseClass(): string
    {
        return PhoneCall::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $randomId
     * @param string $gAHash
     * @param PhoneCallProtocol $protocol
     * @param bool|null $video
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $randomId,
        public readonly string $gAHash,
        public readonly PhoneCallProtocol $protocol,
        public readonly ?bool $video = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->int32($this->randomId);
        $buffer .= $serializer->bytes($this->gAHash);
        $buffer .= $this->protocol->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}