<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Phone\AbstractExportedGroupCallInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.exportGroupCallInvite
 */
final class ExportGroupCallInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3869926527;
    
    public string $_ = 'phone.exportGroupCallInvite';
    
    public function getMethodName(): string
    {
        return 'phone.exportGroupCallInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedGroupCallInvite::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param bool|null $canSelfUnmute
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly ?bool $canSelfUnmute = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canSelfUnmute) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->call->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}