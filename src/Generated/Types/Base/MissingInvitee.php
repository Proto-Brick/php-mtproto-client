<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/missingInvitee
 */
final class MissingInvitee extends TlObject
{
    public const CONSTRUCTOR_ID = 0x628c9224;
    
    public string $_ = 'missingInvitee';
    
    /**
     * @param int $userId
     * @param bool|null $premiumWouldAllowInvite
     * @param bool|null $premiumRequiredForPm
     */
    public function __construct(
        public readonly int $userId,
        public readonly ?bool $premiumWouldAllowInvite = null,
        public readonly ?bool $premiumRequiredForPm = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premiumWouldAllowInvite) $flags |= (1 << 0);
        if ($this->premiumRequiredForPm) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->userId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $premiumWouldAllowInvite = ($flags & (1 << 0)) ? true : null;
        $premiumRequiredForPm = ($flags & (1 << 1)) ? true : null;
        $userId = $deserializer->int64($stream);
        return new self(
            $userId,
            $premiumWouldAllowInvite,
            $premiumRequiredForPm
        );
    }
}