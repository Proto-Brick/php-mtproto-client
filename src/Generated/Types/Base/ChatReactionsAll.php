<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatReactionsAll
 */
final class ChatReactionsAll extends AbstractChatReactions
{
    public const CONSTRUCTOR_ID = 0x52928bca;
    
    public string $_ = 'chatReactionsAll';
    
    /**
     * @param bool|null $allowCustom
     */
    public function __construct(
        public readonly ?bool $allowCustom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowCustom) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $allowCustom = ($flags & (1 << 0)) ? true : null;
        return new self(
            $allowCustom
        );
    }
}