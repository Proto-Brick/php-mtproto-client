<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateColor
 */
final class UpdateColorRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7cefa15d;
    
    public string $predicate = 'account.updateColor';
    
    public function getMethodName(): string
    {
        return 'account.updateColor';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param true|null $forProfile
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     */
    public function __construct(
        public readonly ?true $forProfile = null,
        public readonly ?int $color = null,
        public readonly ?int $backgroundEmojiId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forProfile) $flags |= (1 << 1);
        if ($this->color !== null) $flags |= (1 << 2);
        if ($this->backgroundEmojiId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->color);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->backgroundEmojiId);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}