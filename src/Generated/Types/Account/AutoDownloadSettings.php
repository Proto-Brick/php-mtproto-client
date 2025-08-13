<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AutoDownloadSettings as BaseAutoDownloadSettings;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.autoDownloadSettings
 */
final class AutoDownloadSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x63cacf26;
    
    public string $predicate = 'account.autoDownloadSettings';
    
    /**
     * @param BaseAutoDownloadSettings $low
     * @param BaseAutoDownloadSettings $medium
     * @param BaseAutoDownloadSettings $high
     */
    public function __construct(
        public readonly BaseAutoDownloadSettings $low,
        public readonly BaseAutoDownloadSettings $medium,
        public readonly BaseAutoDownloadSettings $high
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->low->serialize();
        $buffer .= $this->medium->serialize();
        $buffer .= $this->high->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $low = BaseAutoDownloadSettings::deserialize($stream);
        $medium = BaseAutoDownloadSettings::deserialize($stream);
        $high = BaseAutoDownloadSettings::deserialize($stream);

        return new self(
            $low,
            $medium,
            $high
        );
    }
}