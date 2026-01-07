<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractThemes;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getThemes
 */
final class GetThemesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7206e458;
    
    public string $predicate = 'account.getThemes';
    
    public function getMethodName(): string
    {
        return 'account.getThemes';
    }
    
    public function getResponseClass(): string
    {
        return AbstractThemes::class;
    }
    /**
     * @param string $format
     * @param int $hash
     */
    public function __construct(
        public readonly string $format,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->format);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}