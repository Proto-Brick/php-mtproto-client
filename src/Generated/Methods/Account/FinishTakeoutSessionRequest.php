<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.finishTakeoutSession
 */
final class FinishTakeoutSessionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 489050862;
    
    public string $_ = 'account.finishTakeoutSession';
    
    public function getMethodName(): string
    {
        return 'account.finishTakeoutSession';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool|null $success
     */
    public function __construct(
        public readonly ?bool $success = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->success) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}