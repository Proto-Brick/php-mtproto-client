<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setBotCallbackAnswer
 */
final class SetBotCallbackAnswerRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3582923530;
    
    public string $_ = 'messages.setBotCallbackAnswer';
    
    public function getMethodName(): string
    {
        return 'messages.setBotCallbackAnswer';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $queryId
     * @param int $cacheTime
     * @param bool|null $alert
     * @param string|null $message
     * @param string|null $url
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $cacheTime,
        public readonly ?bool $alert = null,
        public readonly ?string $message = null,
        public readonly ?string $url = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->alert) $flags |= (1 << 1);
        if ($this->message !== null) $flags |= (1 << 0);
        if ($this->url !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->queryId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->message);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->url);
        }
        $buffer .= $serializer->int32($this->cacheTime);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}