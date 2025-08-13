<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\PasswordSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getPasswordSettings
 */
final class GetPasswordSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9cd4eaf9;
    
    public string $predicate = 'account.getPasswordSettings';
    
    public function getMethodName(): string
    {
        return 'account.getPasswordSettings';
    }
    
    public function getResponseClass(): string
    {
        return PasswordSettings::class;
    }
    /**
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->password->serialize();
        return $buffer;
    }
}