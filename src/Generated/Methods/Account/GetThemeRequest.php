<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputTheme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Theme;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getTheme
 */
final class GetThemeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3a5869ec;
    
    public string $predicate = 'account.getTheme';
    
    public function getMethodName(): string
    {
        return 'account.getTheme';
    }
    
    public function getResponseClass(): string
    {
        return Theme::class;
    }
    /**
     * @param string $format
     * @param AbstractInputTheme $theme
     */
    public function __construct(
        public readonly string $format,
        public readonly AbstractInputTheme $theme
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->format);
        $buffer .= $this->theme->serialize();
        return $buffer;
    }
}