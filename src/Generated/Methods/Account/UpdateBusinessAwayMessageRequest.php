<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessAwayMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateBusinessAwayMessage
 */
final class UpdateBusinessAwayMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa26a7fa5;
    
    public string $_ = 'account.updateBusinessAwayMessage';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessAwayMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputBusinessAwayMessage|null $message
     */
    public function __construct(
        public readonly ?InputBusinessAwayMessage $message = null
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