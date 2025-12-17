<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/botVerifierSettings
 */
final class BotVerifierSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb0cd6617;
    
    public string $predicate = 'botVerifierSettings';
    
    /**
     * @param int $icon
     * @param string $company
     * @param true|null $canModifyCustomDescription
     * @param string|null $customDescription
     */
    public function __construct(
        public readonly int $icon,
        public readonly string $company,
        public readonly ?true $canModifyCustomDescription = null,
        public readonly ?string $customDescription = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canModifyCustomDescription) {
            $flags |= (1 << 1);
        }
        if ($this->customDescription !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->icon);
        $buffer .= Serializer::bytes($this->company);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->customDescription);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $canModifyCustomDescription = (($flags & (1 << 1)) !== 0) ? true : null;
        $icon = Deserializer::int64($__payload, $__offset);
        $company = Deserializer::bytes($__payload, $__offset);
        $customDescription = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $icon,
            $company,
            $canModifyCustomDescription,
            $customDescription
        );
    }
}