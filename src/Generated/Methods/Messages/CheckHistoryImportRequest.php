<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\HistoryImportParsed;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.checkHistoryImport
 */
final class CheckHistoryImportRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x43fe19f3;
    
    public string $predicate = 'messages.checkHistoryImport';
    
    public function getMethodName(): string
    {
        return 'messages.checkHistoryImport';
    }
    
    public function getResponseClass(): string
    {
        return HistoryImportParsed::class;
    }
    /**
     * @param string $importHead
     */
    public function __construct(
        public readonly string $importHead
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->importHead);
        return $buffer;
    }
}