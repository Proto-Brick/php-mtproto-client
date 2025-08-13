<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getLocated
 */
final class GetLocatedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd348bc44;
    
    public string $predicate = 'contacts.getLocated';
    
    public function getMethodName(): string
    {
        return 'contacts.getLocated';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGeoPoint $geoPoint
     * @param true|null $background
     * @param int|null $selfExpires
     */
    public function __construct(
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly ?true $background = null,
        public readonly ?int $selfExpires = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->background) {
            $flags |= (1 << 1);
        }
        if ($this->selfExpires !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->geoPoint->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->selfExpires);
        }
        return $buffer;
    }
}