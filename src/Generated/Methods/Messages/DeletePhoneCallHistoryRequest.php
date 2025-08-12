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
    
    public string $predicate = 'messages.deletePhoneCallHistory';
    
    public function getMethodName(): string
    {
        return 'messages.deletePhoneCallHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedFoundMessages::class;
    }
    /**
     * @param true|null $revoke
     */
    public function __construct(
        public readonly ?true $revoke = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoke) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}