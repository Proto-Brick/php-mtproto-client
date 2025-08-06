<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessGreetingMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateBusinessGreetingMessage
 */
final class UpdateBusinessGreetingMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x66cdafc4;
    
    public string $_ = 'account.updateBusinessGreetingMessage';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessGreetingMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputBusinessGreetingMessage|null $message
     */
    public function __construct(
        public readonly ?InputBusinessGreetingMessage $message = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->message !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->message->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}