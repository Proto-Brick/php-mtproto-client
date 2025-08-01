<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getQuickReplyMessages
 */
final class GetQuickReplyMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2493814211;
    
    public string $_ = 'messages.getQuickReplyMessages';
    
    public function getMethodName(): string
    {
        return 'messages.getQuickReplyMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param int $shortcutId
     * @param int $hash
     * @param list<int>|null $id
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly int $hash,
        public readonly ?array $id = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->id !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->shortcutId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfInts($this->id);
        }
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}