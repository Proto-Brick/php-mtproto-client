<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.sendCustomRequest
 */
final class SendCustomRequestRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xaa2769ed;
    
    public string $_ = 'bots.sendCustomRequest';
    
    public function getMethodName(): string
    {
        return 'bots.sendCustomRequest';
    }
    
    public function getResponseClass(): string
    {
        return 'array';
    }
    /**
     * @param string $customMethod
     * @param array $params
     */
    public function __construct(
        public readonly string $customMethod,
        public readonly array $params
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->customMethod);
        $buffer .= Serializer::bytes(json_encode($this->params, JSON_FORCE_OBJECT));
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}