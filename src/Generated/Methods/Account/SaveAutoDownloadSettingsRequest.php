<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AutoDownloadSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.saveAutoDownloadSettings
 */
final class SaveAutoDownloadSettingsRequest extends RpcRequest
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
        if ($this->low) {
            $flags |= (1 << 0);
        }
        if ($this->high) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
}