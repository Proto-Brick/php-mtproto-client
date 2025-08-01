<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAffectedMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.deleteMessages
 */
final class DeleteMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3851326930;
    
    public string $_ = 'messages.deleteMessages';
    
    public function getMethodName(): string
    {
        return 'messages.deleteMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAffectedMessages::class;
    }
    /**
     * @param list<int> $id
     * @param bool|null $revoke
     */
    public function __construct(
        public readonly array $id,
        public readonly ?bool $revoke = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoke) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfInts($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}