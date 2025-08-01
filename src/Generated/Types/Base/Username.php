<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/username
 */
final class Username extends AbstractUsername
{
    public const CONSTRUCTOR_ID = 3020371527;
    
    public string $_ = 'username';
    
    /**
     * @param string $username
     * @param bool|null $editable
     * @param bool|null $active
     */
    public function __construct(
        public readonly string $username,
        public readonly ?bool $editable = null,
        public readonly ?bool $active = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->editable) $flags |= (1 << 0);
        if ($this->active) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->username);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $editable = ($flags & (1 << 0)) ? true : null;
        $active = ($flags & (1 << 1)) ? true : null;
        $username = $deserializer->bytes($stream);
            return new self(
            $username,
            $editable,
            $active
        );
    }
}