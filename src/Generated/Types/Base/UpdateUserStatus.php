<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateUserStatus
 */
final class UpdateUserStatus extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xe5bdf8de;
    
    public string $predicate = 'updateUserStatus';
    
    /**
     * @param int $userId
     * @param AbstractUserStatus $status
     */
    public function __construct(
        public readonly int $userId,
        public readonly AbstractUserStatus $status
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= $this->status->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $userId = Deserializer::int64($__payload, $__offset);
        $status = AbstractUserStatus::deserialize($__payload, $__offset);

        return new self(
            $userId,
            $status
        );
    }
}