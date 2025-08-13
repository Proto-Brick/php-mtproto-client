<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\InviteText;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getInviteText
 */
final class GetInviteTextRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4d392343;
    
    public string $predicate = 'help.getInviteText';
    
    public function getMethodName(): string
    {
        return 'help.getInviteText';
    }
    
    public function getResponseClass(): string
    {
        return InviteText::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}