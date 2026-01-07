<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractWallPaper;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getMultiWallPapers
 */
final class GetMultiWallPapersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x65ad71dc;
    
    public string $predicate = 'account.getMultiWallPapers';
    
    public function getMethodName(): string
    {
        return 'account.getMultiWallPapers';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractWallPaper::class . '>';
    }
    /**
     * @param list<AbstractInputWallPaper> $wallpapers
     */
    public function __construct(
        public readonly array $wallpapers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->wallpapers);
        return $buffer;
    }
}