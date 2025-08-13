<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\Config;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getConfig
 */
final class GetConfigRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc4f9186b;
    
    public string $predicate = 'help.getConfig';
    
    public function getMethodName(): string
    {
        return 'help.getConfig';
    }
    
    public function getResponseClass(): string
    {
        return Config::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}