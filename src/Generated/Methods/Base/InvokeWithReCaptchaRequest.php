<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/invokeWithReCaptcha
 */
final class InvokeWithReCaptchaRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xadbb0f94;
    
    public string $predicate = 'invokeWithReCaptcha';
    
    public function getMethodName(): string
    {
        return 'invokeWithReCaptcha';
    }
    
    public function getResponseClass(): string
    {
        return TlObject::class;
    }
    /**
     * @param string $token
     * @param TlObject $query
     */
    public function __construct(
        public readonly string $token,
        public readonly TlObject $query
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->token);
        $buffer .= $this->query->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}