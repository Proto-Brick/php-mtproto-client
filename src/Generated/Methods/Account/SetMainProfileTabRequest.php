<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ProfileTab;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.setMainProfileTab
 */
final class SetMainProfileTabRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5dee78b0;
    
    public string $predicate = 'account.setMainProfileTab';
    
    public function getMethodName(): string
    {
        return 'account.setMainProfileTab';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param ProfileTab $tab
     */
    public function __construct(
        public readonly ProfileTab $tab
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->tab->serialize();
        return $buffer;
    }
}