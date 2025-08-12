<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getCustomEmojiDocuments
 */
final class GetCustomEmojiDocumentsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd9ab0f54;
    
    public string $predicate = 'messages.getCustomEmojiDocuments';
    
    public function getMethodName(): string
    {
        return 'messages.getCustomEmojiDocuments';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractDocument::class . '>';
    }
    /**
     * @param list<int> $documentId
     */
    public function __construct(
        public readonly array $documentId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->documentId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}