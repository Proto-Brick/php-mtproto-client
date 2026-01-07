<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputTheme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BaseTheme;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.installTheme
 */
final class InstallThemeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc727bb3b;
    
    public string $predicate = 'account.installTheme';
    
    public function getMethodName(): string
    {
        return 'account.installTheme';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param true|null $dark
     * @param AbstractInputTheme|null $theme
     * @param string|null $format
     * @param BaseTheme|null $baseTheme
     */
    public function __construct(
        public readonly ?true $dark = null,
        public readonly ?AbstractInputTheme $theme = null,
        public readonly ?string $format = null,
        public readonly ?BaseTheme $baseTheme = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) {
            $flags |= (1 << 0);
        }
        if ($this->theme !== null) {
            $flags |= (1 << 1);
        }
        if ($this->format !== null) {
            $flags |= (1 << 2);
        }
        if ($this->baseTheme !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->theme->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->format);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->baseTheme->serialize();
        }
        return $buffer;
    }
}