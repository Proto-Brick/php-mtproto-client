<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCode
 */
final class SentCode extends AbstractSentCode
{
    public const CONSTRUCTOR_ID = 1577067778;
    
    public string $_ = 'auth.sentCode';
    
    /**
     * @param AbstractSentCodeType $type
     * @param string $phoneCodeHash
     * @param AbstractCodeType|null $nextType
     * @param int|null $timeout
     */
    public function __construct(
        public readonly AbstractSentCodeType $type,
        public readonly string $phoneCodeHash,
        public readonly ?AbstractCodeType $nextType = null,
        public readonly ?int $timeout = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextType !== null) $flags |= (1 << 1);
        if ($this->timeout !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->type->serialize($serializer);
        $buffer .= $serializer->bytes($this->phoneCodeHash);
        if ($flags & (1 << 1)) {
            $buffer .= $this->nextType->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->timeout);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $type = AbstractSentCodeType::deserialize($deserializer, $stream);
        $phoneCodeHash = $deserializer->bytes($stream);
        $nextType = ($flags & (1 << 1)) ? AbstractCodeType::deserialize($deserializer, $stream) : null;
        $timeout = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
            return new self(
            $type,
            $phoneCodeHash,
            $nextType,
            $timeout
        );
    }
}