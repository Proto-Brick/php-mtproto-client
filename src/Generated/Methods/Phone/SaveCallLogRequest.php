<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhoneCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.saveCallLog
 */
final class SaveCallLogRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x41248786;
    
    public string $predicate = 'phone.saveCallLog';
    
    public function getMethodName(): string
    {
        return 'phone.saveCallLog';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputPhoneCall $peer
     * @param AbstractInputFile $file
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly AbstractInputFile $file
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->file->serialize();
        return $buffer;
    }
}