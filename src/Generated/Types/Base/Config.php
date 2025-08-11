<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/config
 */
final class Config extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcc1a241e;
    
    public string $_ = 'config';
    
    /**
     * @param int $date
     * @param int $expires
     * @param bool $testMode
     * @param int $thisDc
     * @param list<DcOption> $dcOptions
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
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
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->expires);
        $buffer .= ($this->testMode ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        $buffer .= Serializer::int32($this->thisDc);
        $buffer .= Serializer::vectorOfObjects($this->dcOptions);
        $buffer .= Serializer::bytes($this->dcTxtDomainName);
        $buffer .= Serializer::int32($this->chatSizeMax);
        $buffer .= Serializer::int32($this->megagroupSizeMax);
        $buffer .= Serializer::int32($this->forwardedCountMax);
        $buffer .= Serializer::int32($this->onlineUpdatePeriodMs);
        $buffer .= Serializer::int32($this->offlineBlurTimeoutMs);
        $buffer .= Serializer::int32($this->offlineIdleTimeoutMs);
        $buffer .= Serializer::int32($this->onlineCloudTimeoutMs);
        $buffer .= Serializer::int32($this->notifyCloudDelayMs);
        $buffer .= Serializer::int32($this->notifyDefaultDelayMs);
        $buffer .= Serializer::int32($this->pushChatPeriodMs);
        $buffer .= Serializer::int32($this->pushChatLimit);
        $buffer .= Serializer::int32($this->editTimeLimit);
        $buffer .= Serializer::int32($this->revokeTimeLimit);
        $buffer .= Serializer::int32($this->revokePmTimeLimit);
        $buffer .= Serializer::int32($this->ratingEDecay);
        $buffer .= Serializer::int32($this->stickersRecentLimit);
        $buffer .= Serializer::int32($this->channelsReadMediaPeriod);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->tmpSessions);
        }
        $buffer .= Serializer::int32($this->callReceiveTimeoutMs);
        $buffer .= Serializer::int32($this->callRingTimeoutMs);
        $buffer .= Serializer::int32($this->callConnectTimeoutMs);
        $buffer .= Serializer::int32($this->callPacketTimeoutMs);
        $buffer .= Serializer::bytes($this->meUrlPrefix);
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::bytes($this->autoupdateUrlPrefix);
        }
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::bytes($this->gifSearchUsername);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::bytes($this->venueSearchUsername);
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::bytes($this->imgSearchUsername);
        }
        if ($flags & (1 << 12)) {
            $buffer .= Serializer::bytes($this->staticMapsProvider);
        }
        $buffer .= Serializer::int32($this->captionLengthMax);
        $buffer .= Serializer::int32($this->messageLengthMax);
        $buffer .= Serializer::int32($this->webfileDcId);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->suggestedLangCode);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->langPackVersion);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->baseLangPackVersion);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->reactionsDefault->serialize();
        }
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::bytes($this->autologinToken);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $defaultP2pContacts = ($flags & (1 << 3)) ? true : null;
        $preloadFeaturedStickers = ($flags & (1 << 4)) ? true : null;
        $revokePmInbox = ($flags & (1 << 6)) ? true : null;
        $blockedMode = ($flags & (1 << 8)) ? true : null;
        $forceTryIpv6 = ($flags & (1 << 14)) ? true : null;
        $date = Deserializer::int32($stream);
        $expires = Deserializer::int32($stream);
        $testMode = (Deserializer::int32($stream) === 0x997275b5);
        $thisDc = Deserializer::int32($stream);
        $dcOptions = Deserializer::vectorOfObjects($stream, [DcOption::class, 'deserialize']);
        $dcTxtDomainName = Deserializer::bytes($stream);
        $chatSizeMax = Deserializer::int32($stream);
        $megagroupSizeMax = Deserializer::int32($stream);
        $forwardedCountMax = Deserializer::int32($stream);
        $onlineUpdatePeriodMs = Deserializer::int32($stream);
        $offlineBlurTimeoutMs = Deserializer::int32($stream);
        $offlineIdleTimeoutMs = Deserializer::int32($stream);
        $onlineCloudTimeoutMs = Deserializer::int32($stream);
        $notifyCloudDelayMs = Deserializer::int32($stream);
        $notifyDefaultDelayMs = Deserializer::int32($stream);
        $pushChatPeriodMs = Deserializer::int32($stream);
        $pushChatLimit = Deserializer::int32($stream);
        $editTimeLimit = Deserializer::int32($stream);
        $revokeTimeLimit = Deserializer::int32($stream);
        $revokePmTimeLimit = Deserializer::int32($stream);
        $ratingEDecay = Deserializer::int32($stream);
        $stickersRecentLimit = Deserializer::int32($stream);
        $channelsReadMediaPeriod = Deserializer::int32($stream);
        $tmpSessions = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $callReceiveTimeoutMs = Deserializer::int32($stream);
        $callRingTimeoutMs = Deserializer::int32($stream);
        $callConnectTimeoutMs = Deserializer::int32($stream);
        $callPacketTimeoutMs = Deserializer::int32($stream);
        $meUrlPrefix = Deserializer::bytes($stream);
        $autoupdateUrlPrefix = ($flags & (1 << 7)) ? Deserializer::bytes($stream) : null;
        $gifSearchUsername = ($flags & (1 << 9)) ? Deserializer::bytes($stream) : null;
        $venueSearchUsername = ($flags & (1 << 10)) ? Deserializer::bytes($stream) : null;
        $imgSearchUsername = ($flags & (1 << 11)) ? Deserializer::bytes($stream) : null;
        $staticMapsProvider = ($flags & (1 << 12)) ? Deserializer::bytes($stream) : null;
        $captionLengthMax = Deserializer::int32($stream);
        $messageLengthMax = Deserializer::int32($stream);
        $webfileDcId = Deserializer::int32($stream);
        $suggestedLangCode = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $langPackVersion = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $baseLangPackVersion = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $reactionsDefault = ($flags & (1 << 15)) ? AbstractReaction::deserialize($stream) : null;
        $autologinToken = ($flags & (1 << 16)) ? Deserializer::bytes($stream) : null;
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