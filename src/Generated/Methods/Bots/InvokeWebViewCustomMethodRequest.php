<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.invokeWebViewCustomMethod
 */
final class InvokeWebViewCustomMethodRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 142591463;
    
    public string $_ = 'bots.invokeWebViewCustomMethod';
    
    public function getMethodName(): string
    {
        return 'bots.invokeWebViewCustomMethod';
    }
    
    public function getResponseClass(): string
    {
        return 'array';
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $customMethod
     * @param array $params
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $customMethod,
        public readonly array $params
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->bytes($this->customMethod);
        $buffer .= (new DataJSON(json_encode($this->params)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}