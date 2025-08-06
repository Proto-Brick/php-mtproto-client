<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.toggleGroupCallSettings
 */
final class ToggleGroupCallSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x74bbb43d;
    
    public string $_ = 'phone.toggleGroupCallSettings';
    
    public function getMethodName(): string
    {
        return 'phone.toggleGroupCallSettings';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputGroupCall $call
     * @param bool|null $resetInviteHash
     * @param bool|null $joinMuted
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly ?bool $resetInviteHash = null,
        public readonly ?bool $joinMuted = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->resetInviteHash) $flags |= (1 << 1);
        if ($this->joinMuted !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->call->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->joinMuted ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}