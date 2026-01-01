<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Diagnostics;

class RequestTrace
{
    public float $start;

    // Тайминги
    public float $ser = 0.0;
    public float $enc = 0.0;
    public float $net = 0.0;
    public float $dec = 0.0;
    public float $des = 0.0;

    // Новые метрики
    public int $reqBytes = 0; // Размер запроса (байт)
    public int $resBytes = 0; // Размер ответа (байт)
    public int $attempts = 0; // Количество попыток отправки

    public function __construct() {
        $this->start = hrtime(true);
    }

    public function finish(): array {
        $total = (hrtime(true) - $this->start) / 1e+6;
        $this->net = max(0, $total - ($this->ser + $this->enc + $this->dec + $this->des));

        $fmt = static fn($n) => number_format($n, 2, '.', '');

        return [
            'ser' => $fmt($this->ser),
            'enc' => $fmt($this->enc),
            'net' => $fmt($this->net),
            'dec' => $fmt($this->dec),
            'des' => $fmt($this->des),
            'total' => $fmt($total),
            'req_size' => $this->formatBytes($this->reqBytes),
            'res_size' => $this->formatBytes($this->resBytes),
            'attempts' => $this->attempts
        ];
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes < 1024) return $bytes . 'B';
        if ($bytes < 1048576) return round($bytes / 1024, 1) . 'KB';
        return round($bytes / 1048576, 2) . 'MB';
    }
}