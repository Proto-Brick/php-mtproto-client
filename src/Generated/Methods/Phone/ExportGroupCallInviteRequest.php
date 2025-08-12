<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Phone\ExportedGroupCallInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.exportGroupCallInvite
 */
final class ExportGroupCallInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe6aa647f;
    
    public string $predicate = 'phone.exportGroupCallInvite';
    
    public function getMethodName(): string
    {
        return 'phone.exportGroupCallInvite';
    }
    
    public function getResponseClass(): string
    {
        return ExportedGroupCallInvite::class;
    }
    /**
     * @param InputGroupCall $call
     * @param true|null $canSelfUnmute
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly ?true $canSelfUnmute = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canSelfUnmute) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}