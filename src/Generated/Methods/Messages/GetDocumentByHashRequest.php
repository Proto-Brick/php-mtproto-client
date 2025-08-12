<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getDocumentByHash
 */
final class GetDocumentByHashRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb1f2061f;
    
    public string $predicate = 'messages.getDocumentByHash';
    
    public function getMethodName(): string
    {
        return 'messages.getDocumentByHash';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDocument::class;
    }
    /**
     * @param string $sha256
     * @param int $size
     * @param string $mimeType
     */
    public function __construct(
        public readonly string $sha256,
        public readonly int $size,
        public readonly string $mimeType
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->sha256);
        $buffer .= Serializer::int64($this->size);
        $buffer .= Serializer::bytes($this->mimeType);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}