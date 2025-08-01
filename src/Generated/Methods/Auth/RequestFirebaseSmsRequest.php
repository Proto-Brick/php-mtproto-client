<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.requestFirebaseSms
 */
final class RequestFirebaseSmsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2386109982;
    
    public string $_ = 'auth.requestFirebaseSms';
    
    public function getMethodName(): string
    {
        return 'auth.requestFirebaseSms';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $safetyNetToken
     * @param string|null $playIntegrityToken
     * @param string|null $iosPushSecret
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly ?string $safetyNetToken = null,
        public readonly ?string $playIntegrityToken = null,
        public readonly ?string $iosPushSecret = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->safetyNetToken !== null) $flags |= (1 << 0);
        if ($this->playIntegrityToken !== null) $flags |= (1 << 2);
        if ($this->iosPushSecret !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $serializer->bytes($this->phoneCodeHash);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->safetyNetToken);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->playIntegrityToken);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->iosPushSecret);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}