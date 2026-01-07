<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\PasswordInputSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updatePasswordSettings
 */
final class UpdatePasswordSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa59b102f;
    
    public string $predicate = 'account.updatePasswordSettings';
    
    public function getMethodName(): string
    {
        return 'account.updatePasswordSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputCheckPasswordSRP $password
     * @param PasswordInputSettings $newSettings
     */
    public function __construct(
        public readonly AbstractInputCheckPasswordSRP $password,
        public readonly PasswordInputSettings $newSettings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->password->serialize();
        $buffer .= $this->newSettings->serialize();
        return $buffer;
    }
}