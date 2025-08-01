<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.blockFromReplies
 */
final class BlockFromRepliesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 698914348;
    
    public string $_ = 'contacts.blockFromReplies';
    
    public function getMethodName(): string
    {
        return 'contacts.blockFromReplies';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $msgId
     * @param bool|null $deleteMessage
     * @param bool|null $deleteHistory
     * @param bool|null $reportSpam
     */
    public function __construct(
        public readonly int $msgId,
        public readonly ?bool $deleteMessage = null,
        public readonly ?bool $deleteHistory = null,
        public readonly ?bool $reportSpam = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->deleteMessage) $flags |= (1 << 0);
        if ($this->deleteHistory) $flags |= (1 << 1);
        if ($this->reportSpam) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->msgId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}