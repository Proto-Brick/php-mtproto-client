<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/urlAuthResultRequest
 */
final class UrlAuthResultRequest extends AbstractUrlAuthResult
{
    public const CONSTRUCTOR_ID = 0x92d33a0e;
    
    public string $predicate = 'urlAuthResultRequest';
    
    /**
     * @param AbstractUser $bot
     * @param string $domain
     * @param true|null $requestWriteAccess
     */
    public function __construct(
        public readonly AbstractUser $bot,
        public readonly string $domain,
        public readonly ?true $requestWriteAccess = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requestWriteAccess) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->domain);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $requestWriteAccess = (($flags & (1 << 0)) !== 0) ? true : null;
        $bot = AbstractUser::deserialize($__payload, $__offset);
        $domain = Deserializer::bytes($__payload, $__offset);

        return new self(
            $bot,
            $domain,
            $requestWriteAccess
        );
    }
}