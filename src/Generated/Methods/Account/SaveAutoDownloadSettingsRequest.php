<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AutoDownloadSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveAutoDownloadSettings
 */
final class SaveAutoDownloadSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x76f36233;
    
    public string $predicate = 'account.saveAutoDownloadSettings';
    
    public function getMethodName(): string
    {
        return 'account.saveAutoDownloadSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AutoDownloadSettings $settings
     * @param true|null $low
     * @param true|null $high
     */
    public function __construct(
        public readonly AutoDownloadSettings $settings,
        public readonly ?true $low = null,
        public readonly ?true $high = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->low) $flags |= (1 << 0);
        if ($this->high) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->settings->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}