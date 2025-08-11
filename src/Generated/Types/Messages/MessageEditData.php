<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.messageEditData
 */
final class MessageEditData extends TlObject
{
    public const CONSTRUCTOR_ID = 0x26b5dde6;
    
    public string $_ = 'messages.messageEditData';
    
    /**
     * @param bool|null $caption
     */
    public function __construct(
        public readonly ?bool $caption = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->caption) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $caption = ($flags & (1 << 0)) ? true : null;
        return new self(
            $caption
        );
    }
}