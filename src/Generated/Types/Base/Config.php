<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/config
 */
final class Config extends AbstractConfig
{
    public const CONSTRUCTOR_ID = 3424265246;
    
    public string $_ = 'config';
    
    /**
     * @param int $date
     * @param int $expires
     * @param bool $testMode
     * @param int $thisDc
     * @param list<AbstractDcOption> $dcOptions
     * @param string $dcTxtDomainName
     * @param int $chatSizeMax
     * @param int $megagroupSizeMax
     * @param int $forwardedCountMax
     * @param int $onlineUpdatePeriodMs
     * @param int $offlineBlurTimeoutMs
     * @param int $offlineIdleTimeoutMs
     * @param int $onlineCloudTimeoutMs
     * @param int $notifyCloudDelayMs
     * @param int $notifyDefaultDelayMs
     * @param int $pushChatPeriodMs
     * @param int $pushChatLimit
     * @param int $editTimeLimit
     * @param int $revokeTimeLimit
     * @param int $revokePmTimeLimit
     * @param int $ratingEDecay
     * @param int $stickersRecentLimit
     * @param int $channelsReadMediaPeriod
     * @param int $callReceiveTimeoutMs
     * @param int $callRingTimeoutMs
     * @param int $callConnectTimeoutMs
     * @param int $callPacketTimeoutMs
     * @param string $meUrlPrefix
     * @param int $captionLengthMax
     * @param int $messageLengthMax
     * @param int $webfileDcId
     * @param bool|null $defaultP2pContacts
     * @param bool|null $preloadFeaturedStickers
     * @param bool|null $revokePmInbox
     * @param bool|null $blockedMode
     * @param bool|null $forceTryIpv6
     * @param int|null $tmpSessions
     * @param string|null $autoupdateUrlPrefix
     * @param string|null $gifSearchUsername
     * @param string|null $venueSearchUsername
     * @param string|null $imgSearchUsername
     * @param string|null $staticMapsProvider
     * @param string|null $suggestedLangCode
     * @param int|null $langPackVersion
     * @param int|null $baseLangPackVersion
     * @param AbstractReaction|null $reactionsDefault
     * @param string|null $autologinToken
     */
    public function __construct(
        public readonly int $date,
        public readonly int $expires,
        public readonly bool $testMode,
        public readonly int $thisDc,
        public readonly array $dcOptions,
        public readonly string $dcTxtDomainName,
        public readonly int $chatSizeMax,
        public readonly int $megagroupSizeMax,
        public readonly int $forwardedCountMax,
        public readonly int $onlineUpdatePeriodMs,
        public readonly int $offlineBlurTimeoutMs,
        public readonly int $offlineIdleTimeoutMs,
        public readonly int $onlineCloudTimeoutMs,
        public readonly int $notifyCloudDelayMs,
        public readonly int $notifyDefaultDelayMs,
        public readonly int $pushChatPeriodMs,
        public readonly int $pushChatLimit,
        public readonly int $editTimeLimit,
        public readonly int $revokeTimeLimit,
        public readonly int $revokePmTimeLimit,
        public readonly int $ratingEDecay,
        public readonly int $stickersRecentLimit,
        public readonly int $channelsReadMediaPeriod,
        public readonly int $callReceiveTimeoutMs,
        public readonly int $callRingTimeoutMs,
        public readonly int $callConnectTimeoutMs,
        public readonly int $callPacketTimeoutMs,
        public readonly string $meUrlPrefix,
        public readonly int $captionLengthMax,
        public readonly int $messageLengthMax,
        public readonly int $webfileDcId,
        public readonly ?bool $defaultP2pContacts = null,
        public readonly ?bool $preloadFeaturedStickers = null,
        public readonly ?bool $revokePmInbox = null,
        public readonly ?bool $blockedMode = null,
        public readonly ?bool $forceTryIpv6 = null,
        public readonly ?int $tmpSessions = null,
        public readonly ?string $autoupdateUrlPrefix = null,
        public readonly ?string $gifSearchUsername = null,
        public readonly ?string $venueSearchUsername = null,
        public readonly ?string $imgSearchUsername = null,
        public readonly ?string $staticMapsProvider = null,
        public readonly ?string $suggestedLangCode = null,
        public readonly ?int $langPackVersion = null,
        public readonly ?int $baseLangPackVersion = null,
        public readonly ?AbstractReaction $reactionsDefault = null,
        public readonly ?string $autologinToken = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->defaultP2pContacts) $flags |= (1 << 3);
        if ($this->preloadFeaturedStickers) $flags |= (1 << 4);
        if ($this->revokePmInbox) $flags |= (1 << 6);
        if ($this->blockedMode) $flags |= (1 << 8);
        if ($this->forceTryIpv6) $flags |= (1 << 14);
        if ($this->tmpSessions !== null) $flags |= (1 << 0);
        if ($this->autoupdateUrlPrefix !== null) $flags |= (1 << 7);
        if ($this->gifSearchUsername !== null) $flags |= (1 << 9);
        if ($this->venueSearchUsername !== null) $flags |= (1 << 10);
        if ($this->imgSearchUsername !== null) $flags |= (1 << 11);
        if ($this->staticMapsProvider !== null) $flags |= (1 << 12);
        if ($this->suggestedLangCode !== null) $flags |= (1 << 2);
        if ($this->langPackVersion !== null) $flags |= (1 << 2);
        if ($this->baseLangPackVersion !== null) $flags |= (1 << 2);
        if ($this->reactionsDefault !== null) $flags |= (1 << 15);
        if ($this->autologinToken !== null) $flags |= (1 << 16);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->expires);
        $buffer .= ($this->testMode ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        $buffer .= $serializer->int32($this->thisDc);
        $buffer .= $serializer->vectorOfObjects($this->dcOptions);
        $buffer .= $serializer->bytes($this->dcTxtDomainName);
        $buffer .= $serializer->int32($this->chatSizeMax);
        $buffer .= $serializer->int32($this->megagroupSizeMax);
        $buffer .= $serializer->int32($this->forwardedCountMax);
        $buffer .= $serializer->int32($this->onlineUpdatePeriodMs);
        $buffer .= $serializer->int32($this->offlineBlurTimeoutMs);
        $buffer .= $serializer->int32($this->offlineIdleTimeoutMs);
        $buffer .= $serializer->int32($this->onlineCloudTimeoutMs);
        $buffer .= $serializer->int32($this->notifyCloudDelayMs);
        $buffer .= $serializer->int32($this->notifyDefaultDelayMs);
        $buffer .= $serializer->int32($this->pushChatPeriodMs);
        $buffer .= $serializer->int32($this->pushChatLimit);
        $buffer .= $serializer->int32($this->editTimeLimit);
        $buffer .= $serializer->int32($this->revokeTimeLimit);
        $buffer .= $serializer->int32($this->revokePmTimeLimit);
        $buffer .= $serializer->int32($this->ratingEDecay);
        $buffer .= $serializer->int32($this->stickersRecentLimit);
        $buffer .= $serializer->int32($this->channelsReadMediaPeriod);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->tmpSessions);
        }
        $buffer .= $serializer->int32($this->callReceiveTimeoutMs);
        $buffer .= $serializer->int32($this->callRingTimeoutMs);
        $buffer .= $serializer->int32($this->callConnectTimeoutMs);
        $buffer .= $serializer->int32($this->callPacketTimeoutMs);
        $buffer .= $serializer->bytes($this->meUrlPrefix);
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->bytes($this->autoupdateUrlPrefix);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $serializer->bytes($this->gifSearchUsername);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->bytes($this->venueSearchUsername);
        }
        if ($flags & (1 << 11)) {
            $buffer .= $serializer->bytes($this->imgSearchUsername);
        }
        if ($flags & (1 << 12)) {
            $buffer .= $serializer->bytes($this->staticMapsProvider);
        }
        $buffer .= $serializer->int32($this->captionLengthMax);
        $buffer .= $serializer->int32($this->messageLengthMax);
        $buffer .= $serializer->int32($this->webfileDcId);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->suggestedLangCode);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->langPackVersion);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->baseLangPackVersion);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->reactionsDefault->serialize($serializer);
        }
        if ($flags & (1 << 16)) {
            $buffer .= $serializer->bytes($this->autologinToken);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $defaultP2pContacts = ($flags & (1 << 3)) ? true : null;
        $preloadFeaturedStickers = ($flags & (1 << 4)) ? true : null;
        $revokePmInbox = ($flags & (1 << 6)) ? true : null;
        $blockedMode = ($flags & (1 << 8)) ? true : null;
        $forceTryIpv6 = ($flags & (1 << 14)) ? true : null;
        $date = $deserializer->int32($stream);
        $expires = $deserializer->int32($stream);
        $testMode = ($deserializer->int32($stream) === 0x997275b5);
        $thisDc = $deserializer->int32($stream);
        $dcOptions = $deserializer->vectorOfObjects($stream, [AbstractDcOption::class, 'deserialize']);
        $dcTxtDomainName = $deserializer->bytes($stream);
        $chatSizeMax = $deserializer->int32($stream);
        $megagroupSizeMax = $deserializer->int32($stream);
        $forwardedCountMax = $deserializer->int32($stream);
        $onlineUpdatePeriodMs = $deserializer->int32($stream);
        $offlineBlurTimeoutMs = $deserializer->int32($stream);
        $offlineIdleTimeoutMs = $deserializer->int32($stream);
        $onlineCloudTimeoutMs = $deserializer->int32($stream);
        $notifyCloudDelayMs = $deserializer->int32($stream);
        $notifyDefaultDelayMs = $deserializer->int32($stream);
        $pushChatPeriodMs = $deserializer->int32($stream);
        $pushChatLimit = $deserializer->int32($stream);
        $editTimeLimit = $deserializer->int32($stream);
        $revokeTimeLimit = $deserializer->int32($stream);
        $revokePmTimeLimit = $deserializer->int32($stream);
        $ratingEDecay = $deserializer->int32($stream);
        $stickersRecentLimit = $deserializer->int32($stream);
        $channelsReadMediaPeriod = $deserializer->int32($stream);
        $tmpSessions = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $callReceiveTimeoutMs = $deserializer->int32($stream);
        $callRingTimeoutMs = $deserializer->int32($stream);
        $callConnectTimeoutMs = $deserializer->int32($stream);
        $callPacketTimeoutMs = $deserializer->int32($stream);
        $meUrlPrefix = $deserializer->bytes($stream);
        $autoupdateUrlPrefix = ($flags & (1 << 7)) ? $deserializer->bytes($stream) : null;
        $gifSearchUsername = ($flags & (1 << 9)) ? $deserializer->bytes($stream) : null;
        $venueSearchUsername = ($flags & (1 << 10)) ? $deserializer->bytes($stream) : null;
        $imgSearchUsername = ($flags & (1 << 11)) ? $deserializer->bytes($stream) : null;
        $staticMapsProvider = ($flags & (1 << 12)) ? $deserializer->bytes($stream) : null;
        $captionLengthMax = $deserializer->int32($stream);
        $messageLengthMax = $deserializer->int32($stream);
        $webfileDcId = $deserializer->int32($stream);
        $suggestedLangCode = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $langPackVersion = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $baseLangPackVersion = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $reactionsDefault = ($flags & (1 << 15)) ? AbstractReaction::deserialize($deserializer, $stream) : null;
        $autologinToken = ($flags & (1 << 16)) ? $deserializer->bytes($stream) : null;
            return new self(
            $date,
            $expires,
            $testMode,
            $thisDc,
            $dcOptions,
            $dcTxtDomainName,
            $chatSizeMax,
            $megagroupSizeMax,
            $forwardedCountMax,
            $onlineUpdatePeriodMs,
            $offlineBlurTimeoutMs,
            $offlineIdleTimeoutMs,
            $onlineCloudTimeoutMs,
            $notifyCloudDelayMs,
            $notifyDefaultDelayMs,
            $pushChatPeriodMs,
            $pushChatLimit,
            $editTimeLimit,
            $revokeTimeLimit,
            $revokePmTimeLimit,
            $ratingEDecay,
            $stickersRecentLimit,
            $channelsReadMediaPeriod,
            $callReceiveTimeoutMs,
            $callRingTimeoutMs,
            $callConnectTimeoutMs,
            $callPacketTimeoutMs,
            $meUrlPrefix,
            $captionLengthMax,
            $messageLengthMax,
            $webfileDcId,
            $defaultP2pContacts,
            $preloadFeaturedStickers,
            $revokePmInbox,
            $blockedMode,
            $forceTryIpv6,
            $tmpSessions,
            $autoupdateUrlPrefix,
            $gifSearchUsername,
            $venueSearchUsername,
            $imgSearchUsername,
            $staticMapsProvider,
            $suggestedLangCode,
            $langPackVersion,
            $baseLangPackVersion,
            $reactionsDefault,
            $autologinToken
        );
    }
}