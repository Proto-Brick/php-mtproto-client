<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getPaidReactionPrivacy
 */
final class GetPaidReactionPrivacyRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x472455aa;
    
    public string $predicate = 'messages.getPaidReactionPrivacy';
    
    public function getMethodName(): string
    {
        return 'messages.getPaidReactionPrivacy';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}