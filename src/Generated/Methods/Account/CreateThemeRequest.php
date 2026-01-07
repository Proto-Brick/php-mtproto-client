<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputThemeSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Theme;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.createTheme
 */
final class CreateThemeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x652e4400;
    
    public string $predicate = 'account.createTheme';
    
    public function getMethodName(): string
    {
        return 'account.createTheme';
    }
    
    public function getResponseClass(): string
    {
        return Theme::class;
    }
    /**
     * @param string $slug
     * @param string $title
     * @param AbstractInputDocument|null $document
     * @param list<InputThemeSettings>|null $settings
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $title,
        public readonly ?AbstractInputDocument $document = null,
        public readonly ?array $settings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->document !== null) {
            $flags |= (1 << 2);
        }
        if ($this->settings !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 2)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->settings);
        }
        return $buffer;
    }
}