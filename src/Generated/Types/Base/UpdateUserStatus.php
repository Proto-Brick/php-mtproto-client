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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $this->status->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $status = AbstractUserStatus::deserialize($deserializer, $stream);
        return new self(
            $userId,
            $status
        );
    }
}