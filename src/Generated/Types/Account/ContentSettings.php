<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.contentSettings
 */
final class ContentSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x57e28221;
    
    public string $predicate = 'account.contentSettings';
    
    /**
     * @param true|null $sensitiveEnabled
     * @param true|null $sensitiveCanChange
     */
    public function __construct(
        public readonly ?true $sensitiveEnabled = null,
        public readonly ?true $sensitiveCanChange = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sensitiveEnabled) {
            $flags |= (1 << 0);
        }
        if ($this->sensitiveCanChange) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $sensitiveEnabled = (($flags & (1 << 0)) !== 0) ? true : null;
        $sensitiveCanChange = (($flags & (1 << 1)) !== 0) ? true : null;

        return new self(
            $sensitiveEnabled,
            $sensitiveCanChange
        );
    }
}