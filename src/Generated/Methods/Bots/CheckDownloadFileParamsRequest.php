<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.checkDownloadFileParams
 */
final class CheckDownloadFileParamsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x50077589;
    
    public string $predicate = 'bots.checkDownloadFileParams';
    
    public function getMethodName(): string
    {
        return 'bots.checkDownloadFileParams';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $fileName
     * @param string $url
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $fileName,
        public readonly string $url
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->fileName);
        $buffer .= Serializer::bytes($this->url);
        return $buffer;
    }
}