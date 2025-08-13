<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\SavedStarGifts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getSavedStarGifts
 */
final class GetSavedStarGiftsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa319e569;
    
    public string $predicate = 'payments.getSavedStarGifts';
    
    public function getMethodName(): string
    {
        return 'payments.getSavedStarGifts';
    }
    
    public function getResponseClass(): string
    {
        return SavedStarGifts::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $offset
     * @param int $limit
     * @param true|null $excludeUnsaved
     * @param true|null $excludeSaved
     * @param true|null $excludeUnlimited
     * @param true|null $excludeLimited
     * @param true|null $excludeUnique
     * @param true|null $sortByValue
     * @param int|null $collectionId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?true $excludeUnsaved = null,
        public readonly ?true $excludeSaved = null,
        public readonly ?true $excludeUnlimited = null,
        public readonly ?true $excludeLimited = null,
        public readonly ?true $excludeUnique = null,
        public readonly ?true $sortByValue = null,
        public readonly ?int $collectionId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludeUnsaved) {
            $flags |= (1 << 0);
        }
        if ($this->excludeSaved) {
            $flags |= (1 << 1);
        }
        if ($this->excludeUnlimited) {
            $flags |= (1 << 2);
        }
        if ($this->excludeLimited) {
            $flags |= (1 << 3);
        }
        if ($this->excludeUnique) {
            $flags |= (1 << 4);
        }
        if ($this->sortByValue) {
            $flags |= (1 << 5);
        }
        if ($this->collectionId !== null) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->collectionId);
        }
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}