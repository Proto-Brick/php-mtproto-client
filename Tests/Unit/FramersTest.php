<?php

declare(strict_types=1);

use ProtoBrick\MTProtoClient\Transport\Framing\AbridgedFramer;
use ProtoBrick\MTProtoClient\Transport\Framing\IntermediateFramer;
use ProtoBrick\MTProtoClient\Transport\Framing\IntermediatePaddedFramer;
use PHPUnit\Framework\TestCase;

final class FramersTest extends TestCase
{
    public function testAbridgedFraming(): void
    {
        $abr = new AbridgedFramer();
        $payload = str_repeat("A", 16);
        $framed = $abr->frame($payload);
        $prefix = $abr->readPrefix(fn(int $n) => substr($framed, 0, $n));
        self::assertSame(pack('V', 16), $prefix);
        $body = $abr->readBody(fn(int $n) => substr($framed, strlen($framed) - 16), 16);
        self::assertSame($payload, $body);
    }

    public function testIntermediateFraming(): void
    {
        $int = new IntermediateFramer();
        $payload = str_repeat("B", 16);
        $framed = $int->frame($payload);
        $prefix = $int->readPrefix(fn(int $n) => substr($framed, 0, $n));
        self::assertSame(pack('V', 16), $prefix);
        $body = $int->readBody(fn(int $n) => substr($framed, 4, $n), 16);
        self::assertSame($payload, $body);
    }

    public function testIntermediatePaddedFraming(): void
    {
        $pad = new IntermediatePaddedFramer();
        $payload = str_repeat("C", 8);
        $framed = $pad->frame($payload);
        $prefix = $pad->readPrefix(fn(int $n) => substr($framed, 0, $n));
        $len = unpack('V', $prefix)[1];
        $body = $pad->readBody(fn(int $n) => substr($framed, 4, $n), $len);
        self::assertGreaterThanOrEqual(8, strlen($body));
        self::assertLessThanOrEqual(4 + strlen($payload) + 15, 4 + strlen($body));
    }
}


