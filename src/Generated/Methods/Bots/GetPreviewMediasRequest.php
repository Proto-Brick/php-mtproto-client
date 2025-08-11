<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\BotPreviewMedia;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getPreviewMedias
 */
final class GetPreviewMediasRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa2a5594d;
    
    public string $_ = 'bots.getPreviewMedias';
    
    public function getMethodName(): string
    {
        return 'bots.getPreviewMedias';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . BotPreviewMedia::class . '>';
    }
    /**
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}