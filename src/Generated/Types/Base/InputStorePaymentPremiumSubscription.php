<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentPremiumSubscription
 */
final class InputStorePaymentPremiumSubscription extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0xa6751e66;
    
    public string $predicate = 'inputStorePaymentPremiumSubscription';
    
    /**
     * @param true|null $restore
     * @param true|null $upgrade
     */
    public function __construct(
        public readonly ?true $restore = null,
        public readonly ?true $upgrade = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->restore) {
            $flags |= (1 << 0);
        }
        if ($this->upgrade) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $restore = (($flags & (1 << 0)) !== 0) ? true : null;
        $upgrade = (($flags & (1 << 1)) !== 0) ? true : null;

        return new self(
            $restore,
            $upgrade
        );
    }
}