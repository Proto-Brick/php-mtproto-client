<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedFoundMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.deletePhoneCallHistory
 */
final class DeletePhoneCallHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf9cbe409;
    
    public string $_ = 'messages.deletePhoneCallHistory';
    
    public function getMethodName(): string
    {
        return 'messages.deletePhoneCallHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedFoundMessages::class;
    }
    /**
     * @param bool|null $revoke
     */
    public function __construct(
        public readonly ?bool $revoke = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoke) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}