<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhoneCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.setCallRating
 */
final class SetCallRatingRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x59ead627;
    
    public string $predicate = 'phone.setCallRating';
    
    public function getMethodName(): string
    {
        return 'phone.setCallRating';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputPhoneCall $peer
     * @param int $rating
     * @param string $comment
     * @param true|null $userInitiative
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly int $rating,
        public readonly string $comment,
        public readonly ?true $userInitiative = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->userInitiative) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->rating);
        $buffer .= Serializer::bytes($this->comment);
        return $buffer;
    }
}