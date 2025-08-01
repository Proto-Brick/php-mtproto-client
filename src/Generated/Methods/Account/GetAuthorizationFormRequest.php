<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractAuthorizationForm;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getAuthorizationForm
 */
final class GetAuthorizationFormRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2838059386;
    
    public string $_ = 'account.getAuthorizationForm';
    
    public function getMethodName(): string
    {
        return 'account.getAuthorizationForm';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorizationForm::class;
    }
    /**
     * @param int $botId
     * @param string $scope
     * @param string $publicKey
     */
    public function __construct(
        public readonly int $botId,
        public readonly string $scope,
        public readonly string $publicKey
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->bytes($this->scope);
        $buffer .= $serializer->bytes($this->publicKey);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}