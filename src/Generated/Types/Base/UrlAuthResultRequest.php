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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $requestWriteAccess = (($flags & (1 << 0)) !== 0) ? true : null;
        $bot = AbstractUser::deserialize($stream);
        $domain = Deserializer::bytes($stream);

        return new self(
            $bot,
            $domain,
            $requestWriteAccess
        );
    }
}