<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateUserStatus
 */
final class UpdateUserStatus extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xe5bdf8de;
    
    public string $_ = 'updateUserStatus';
    
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $userId = Deserializer::int64($stream);
        $status = AbstractUserStatus::deserialize($stream);
        return new self(
            $userId,
            $status
        );
    }
}