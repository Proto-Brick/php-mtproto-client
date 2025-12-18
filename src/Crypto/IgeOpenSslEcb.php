<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

final readonly class IgeOpenSslEcb
{
    private const string CIPHER = 'aes-256-ecb';
    private const int FLAGS = OPENSSL_RAW_DATA | OPENSSL_NO_PADDING;

    /** Порог переключения на экономный режим (1 МБ) */
    private const int LARGE_DATA_THRESHOLD = 1048576;

    private string $iv1;
    private string $iv2;

    public function __construct(private string $key, string $iv) {
        $this->iv1 = substr($iv, 0, 16);
        $this->iv2 = substr($iv, 16, 16);
    }

    public function encrypt(string $plaintext): string {
        $len = strlen($plaintext);
        if ($len === 0) return '';

        $iv1 = $this->iv1;
        $iv2 = $this->iv2;
        $key = $this->key;

        if ($len <= self::LARGE_DATA_THRESHOLD) {
            $result = [];
            foreach (str_split($plaintext, 16) as $block) {
                $iv1 = openssl_encrypt($block ^ $iv1, self::CIPHER, $key, self::FLAGS) ^ $iv2;
                $iv2 = $block;
                $result[] = $iv1;
            }
            return implode('', $result);
        }

        $result = '';
        for ($i = 0; $i < $len; $i += 16) {
            $block = substr($plaintext, $i, 16);
            $iv1 = openssl_encrypt($block ^ $iv1, self::CIPHER, $key, self::FLAGS) ^ $iv2;
            $iv2 = $block;
            $result .= $iv1;
        }
        return $result;
    }

    public function decrypt(string $ciphertext): string {
        $len = strlen($ciphertext);
        if ($len === 0) return '';

        $iv1 = $this->iv1;
        $iv2 = $this->iv2;
        $key = $this->key;

        if ($len <= self::LARGE_DATA_THRESHOLD) {
            $result = [];
            foreach (str_split($ciphertext, 16) as $block) {
                $decrypted = openssl_decrypt($block ^ $iv2, self::CIPHER, $key, self::FLAGS) ^ $iv1;
                $iv1 = $block;
                $iv2 = $decrypted;
                $result[] = $decrypted;
            }
            return implode('', $result);
        }

        $result = '';
        for ($i = 0; $i < $len; $i += 16) {
            $block = substr($ciphertext, $i, 16);
            $decrypted = openssl_decrypt($block ^ $iv2, self::CIPHER, $key, self::FLAGS) ^ $iv1;
            $iv1 = $block;
            $iv2 = $decrypted;
            $result .= $decrypted;
        }
        return $result;
    }
}