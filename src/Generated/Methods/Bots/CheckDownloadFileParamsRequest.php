<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.checkDownloadFileParams
 */
final class CheckDownloadFileParamsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x50077589;
    
    public string $_ = 'bots.checkDownloadFileParams';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->bytes($this->fileName);
        $buffer .= $serializer->bytes($this->url);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}