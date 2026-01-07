<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs;

use ProtoBrick\MTProtoClient\Generated\Types\Smsjobs\EligibilityToJoin;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/smsjobs.isEligibleToJoin
 */
final class IsEligibleToJoinRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xedc39d0;
    
    public string $predicate = 'smsjobs.isEligibleToJoin';
    
    public function getMethodName(): string
    {
        return 'smsjobs.isEligibleToJoin';
    }
    
    public function getResponseClass(): string
    {
        return EligibilityToJoin::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}