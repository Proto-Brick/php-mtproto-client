<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractTermsOfServiceUpdate;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getTermsOfServiceUpdate
 */
final class GetTermsOfServiceUpdateRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2ca51fd1;
    
    public string $predicate = 'help.getTermsOfServiceUpdate';
    
    public function getMethodName(): string
    {
        return 'help.getTermsOfServiceUpdate';
    }
    
    public function getResponseClass(): string
    {
        return AbstractTermsOfServiceUpdate::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}