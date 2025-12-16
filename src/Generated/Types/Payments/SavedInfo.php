<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\PaymentRequestedInfo;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.savedInfo
 */
final class SavedInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfb8fe43c;
    
    public string $predicate = 'payments.savedInfo';
    
    /**
     * @param true|null $hasSavedCredentials
     * @param PaymentRequestedInfo|null $savedInfo
     */
    public function __construct(
        public readonly ?true $hasSavedCredentials = null,
        public readonly ?PaymentRequestedInfo $savedInfo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasSavedCredentials) {
            $flags |= (1 << 1);
        }
        if ($this->savedInfo !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->savedInfo->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $hasSavedCredentials = (($flags & (1 << 1)) !== 0) ? true : null;
        $savedInfo = (($flags & (1 << 0)) !== 0) ? PaymentRequestedInfo::deserialize($stream) : null;

        return new self(
            $hasSavedCredentials,
            $savedInfo
        );
    }
}