<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\CdnConfig;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getCdnConfig
 */
final class GetCdnConfigRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x52029342;
    
    public string $predicate = 'help.getCdnConfig';
    
    public function getMethodName(): string
    {
        return 'help.getCdnConfig';
    }
    
    public function getResponseClass(): string
    {
        return CdnConfig::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}