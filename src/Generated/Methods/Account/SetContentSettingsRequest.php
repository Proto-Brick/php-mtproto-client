<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.setContentSettings
 */
final class SetContentSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb574b16b;
    
    public string $_ = 'account.setContentSettings';
    
    public function getMethodName(): string
    {
        return 'account.setContentSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool|null $sensitiveEnabled
     */
    public function __construct(
        public readonly ?bool $sensitiveEnabled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sensitiveEnabled) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}