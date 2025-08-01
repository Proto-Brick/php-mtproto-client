<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractHistoryImportParsed;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.checkHistoryImport
 */
final class CheckHistoryImportRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1140726259;
    
    public string $_ = 'messages.checkHistoryImport';
    
    public function getMethodName(): string
    {
        return 'messages.checkHistoryImport';
    }
    
    public function getResponseClass(): string
    {
        return AbstractHistoryImportParsed::class;
    }
    /**
     * @param string $importHead
     */
    public function __construct(
        public readonly string $importHead
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->importHead);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}