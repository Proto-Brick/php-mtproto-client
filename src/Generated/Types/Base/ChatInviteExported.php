<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatInviteExported
 */
final class ChatInviteExported extends AbstractExportedChatInvite
{
    public const CONSTRUCTOR_ID = 0xa22cbd96;
    
    public string $predicate = 'chatInviteExported';
    
    /**
     * @param string $link
     * @param int $adminId
     * @param int $date
     * @param true|null $revoked
     * @param true|null $permanent
     * @param true|null $requestNeeded
     * @param int|null $startDate
     * @param int|null $expireDate
     * @param int|null $usageLimit
     * @param int|null $usage
     * @param int|null $requested
     * @param int|null $subscriptionExpired
     * @param string|null $title
     * @param StarsSubscriptionPricing|null $subscriptionPricing
     */
    public function __construct(
        public readonly string $link,
        public readonly int $adminId,
        public readonly int $date,
        public readonly ?true $revoked = null,
        public readonly ?true $permanent = null,
        public readonly ?true $requestNeeded = null,
        public readonly ?int $startDate = null,
        public readonly ?int $expireDate = null,
        public readonly ?int $usageLimit = null,
        public readonly ?int $usage = null,
        public readonly ?int $requested = null,
        public readonly ?int $subscriptionExpired = null,
        public readonly ?string $title = null,
        public readonly ?StarsSubscriptionPricing $subscriptionPricing = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoked) {
            $flags |= (1 << 0);
        }
        if ($this->permanent) {
            $flags |= (1 << 5);
        }
        if ($this->requestNeeded) {
            $flags |= (1 << 6);
        }
        if ($this->startDate !== null) {
            $flags |= (1 << 4);
        }
        if ($this->expireDate !== null) {
            $flags |= (1 << 1);
        }
        if ($this->usageLimit !== null) {
            $flags |= (1 << 2);
        }
        if ($this->usage !== null) {
            $flags |= (1 << 3);
        }
        if ($this->requested !== null) {
            $flags |= (1 << 7);
        }
        if ($this->subscriptionExpired !== null) {
            $flags |= (1 << 10);
        }
        if ($this->title !== null) {
            $flags |= (1 << 8);
        }
        if ($this->subscriptionPricing !== null) {
            $flags |= (1 << 9);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->link);
        $buffer .= Serializer::int64($this->adminId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->startDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->expireDate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->usageLimit);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->usage);
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int32($this->requested);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->subscriptionExpired);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $this->subscriptionPricing->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $revoked = (($flags & (1 << 0)) !== 0) ? true : null;
        $permanent = (($flags & (1 << 5)) !== 0) ? true : null;
        $requestNeeded = (($flags & (1 << 6)) !== 0) ? true : null;
        $link = Deserializer::bytes($stream);
        $adminId = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $startDate = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($stream) : null;
        $expireDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;
        $usageLimit = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($stream) : null;
        $usage = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($stream) : null;
        $requested = (($flags & (1 << 7)) !== 0) ? Deserializer::int32($stream) : null;
        $subscriptionExpired = (($flags & (1 << 10)) !== 0) ? Deserializer::int32($stream) : null;
        $title = (($flags & (1 << 8)) !== 0) ? Deserializer::bytes($stream) : null;
        $subscriptionPricing = (($flags & (1 << 9)) !== 0) ? StarsSubscriptionPricing::deserialize($stream) : null;

        return new self(
            $link,
            $adminId,
            $date,
            $revoked,
            $permanent,
            $requestNeeded,
            $startDate,
            $expireDate,
            $usageLimit,
            $usage,
            $requested,
            $subscriptionExpired,
            $title,
            $subscriptionPricing
        );
    }
}