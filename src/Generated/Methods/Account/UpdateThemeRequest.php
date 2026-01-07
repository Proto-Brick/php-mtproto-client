<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputTheme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputThemeSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Theme;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateTheme
 */
final class UpdateThemeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2bf40ccc;
    
    public string $predicate = 'account.updateTheme';
    
    public function getMethodName(): string
    {
        return 'account.updateTheme';
    }
    
    public function getResponseClass(): string
    {
        return Theme::class;
    }
    /**
     * @param string $format
     * @param AbstractInputTheme $theme
     * @param string|null $slug
     * @param string|null $title
     * @param AbstractInputDocument|null $document
     * @param list<InputThemeSettings>|null $settings
     */
    public function __construct(
        public readonly string $format,
        public readonly AbstractInputTheme $theme,
        public readonly ?string $slug = null,
        public readonly ?string $title = null,
        public readonly ?AbstractInputDocument $document = null,
        public readonly ?array $settings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->slug !== null) {
            $flags |= (1 << 0);
        }
        if ($this->title !== null) {
            $flags |= (1 << 1);
        }
        if ($this->document !== null) {
            $flags |= (1 << 2);
        }
        if ($this->settings !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->format);
        $buffer .= $this->theme->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->slug);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->settings);
        }
        return $buffer;
    }
}