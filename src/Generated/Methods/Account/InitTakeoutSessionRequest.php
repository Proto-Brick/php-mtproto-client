<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\Takeout;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.initTakeoutSession
 */
final class InitTakeoutSessionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8ef3eab0;
    
    public string $_ = 'account.initTakeoutSession';
    
    public function getMethodName(): string
    {
        return 'account.initTakeoutSession';
    }
    
    public function getResponseClass(): string
    {
        return Takeout::class;
    }
    /**
     * @param bool|null $contacts
     * @param bool|null $messageUsers
     * @param bool|null $messageChats
     * @param bool|null $messageMegagroups
     * @param bool|null $messageChannels
     * @param bool|null $files
     * @param int|null $fileMaxSize
     */
    public function __construct(
        public readonly ?bool $contacts = null,
        public readonly ?bool $messageUsers = null,
        public readonly ?bool $messageChats = null,
        public readonly ?bool $messageMegagroups = null,
        public readonly ?bool $messageChannels = null,
        public readonly ?bool $files = null,
        public readonly ?int $fileMaxSize = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->contacts) $flags |= (1 << 0);
        if ($this->messageUsers) $flags |= (1 << 1);
        if ($this->messageChats) $flags |= (1 << 2);
        if ($this->messageMegagroups) $flags |= (1 << 3);
        if ($this->messageChannels) $flags |= (1 << 4);
        if ($this->files) $flags |= (1 << 5);
        if ($this->fileMaxSize !== null) $flags |= (1 << 5);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int64($this->fileMaxSize);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}