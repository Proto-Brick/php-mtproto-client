<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated;

use ProtoBrick\MTProtoClient\Peer\PeerManager;

/**
 * Auto-generated PeerCollector.
 * Uses optimized switch for maximum performance (Level 3 optimization).
 */
final class PeerCollector
{
    public function collect(object $object, PeerManager $manager): void
    {
        switch ($object::class) {
            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelFull::class:
                if ($object->stories !== null) {
                    $this->collect($object->stories, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\Message::class:
                if ($object->replyTo !== null) {
                    $this->collect($object->replyTo, $manager);
                }
                if ($object->media !== null) {
                    $this->collect($object->media, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\MessageService::class:
                if ($object->replyTo !== null) {
                    $this->collect($object->replyTo, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaWebPage::class:
                if ($object->webpage !== null) {
                    $this->collect($object->webpage, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaInvoice::class:
                if ($object->extendedMedia !== null) {
                    $this->collect($object->extendedMedia, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaStory::class:
                if ($object->story !== null) {
                    $this->collect($object->story, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaPaidMedia::class:
                if ($object->extendedMedia !== null) {
                    foreach ($object->extendedMedia as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCodeSuccess::class:
                if ($object->authorization !== null) {
                    $this->collect($object->authorization, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Auth\Authorization::class:
                if ($object->user !== null) {
                    if ($object->user instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->user);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UserFull::class:
                if ($object->stories !== null) {
                    $this->collect($object->stories, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\Contacts::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\ImportedContacts::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\Blocked::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\BlockedSlice::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\Dialogs::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\DialogsSlice::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\Messages::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\MessagesSlice::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ChannelMessages::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\Chats::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatsSlice::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatFull::class:
                if ($object->fullChat !== null) {
                    $this->collect($object->fullChat, $manager);
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateNewMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateServiceNotification::class:
                if ($object->media !== null) {
                    $this->collect($object->media, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateWebPage::class:
                if ($object->webpage !== null) {
                    $this->collect($object->webpage, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateNewChannelMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateEditChannelMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateEditMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateChannelWebPage::class:
                if ($object->webpage !== null) {
                    $this->collect($object->webpage, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateNewScheduledMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateDialogFilter::class:
                if ($object->filter !== null) {
                    if ($object->filter instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->filter);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateMessageExtendedMedia::class:
                if ($object->extendedMedia !== null) {
                    foreach ($object->extendedMedia as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateStory::class:
                if ($object->story !== null) {
                    $this->collect($object->story, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateQuickReplyMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateBotNewBusinessMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                if ($object->replyToMessage !== null) {
                    $this->collect($object->replyToMessage, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateBotEditBusinessMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                if ($object->replyToMessage !== null) {
                    $this->collect($object->replyToMessage, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateBusinessBotCallbackQuery::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                if ($object->replyToMessage !== null) {
                    $this->collect($object->replyToMessage, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateSentPhoneCode::class:
                if ($object->sentCode !== null) {
                    $this->collect($object->sentCode, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Updates\Difference::class:
                if ($object->newMessages !== null) {
                    foreach ($object->newMessages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->otherUpdates !== null) {
                    foreach ($object->otherUpdates as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Updates\DifferenceSlice::class:
                if ($object->newMessages !== null) {
                    foreach ($object->newMessages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->otherUpdates !== null) {
                    foreach ($object->otherUpdates as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage::class:
                if ($object->replyTo !== null) {
                    $this->collect($object->replyTo, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage::class:
                if ($object->replyTo !== null) {
                    $this->collect($object->replyTo, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort::class:
                if ($object->update !== null) {
                    $this->collect($object->update, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined::class:
                if ($object->updates !== null) {
                    foreach ($object->updates as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\Updates::class:
                if ($object->updates !== null) {
                    foreach ($object->updates as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage::class:
                if ($object->media !== null) {
                    $this->collect($object->media, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Photos\Photos::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Photos\PhotosSlice::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Photos\Photo::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Help\Support::class:
                if ($object->user !== null) {
                    if ($object->user instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->user);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\Found::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Account\PrivacyRules::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\WebPage::class:
                if ($object->cachedPage !== null) {
                    $this->collect($object->cachedPage, $manager);
                }
                if ($object->attributes !== null) {
                    foreach ($object->attributes as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInviteAlready::class:
                if ($object->chat !== null) {
                    if ($object->chat instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->chat);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInvite::class:
                if ($object->participants !== null) {
                    foreach ($object->participants as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInvitePeek::class:
                if ($object->chat !== null) {
                    if ($object->chat instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->chat);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\ResolvedPeer::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Updates\ChannelDifferenceTooLong::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Updates\ChannelDifference::class:
                if ($object->newMessages !== null) {
                    foreach ($object->newMessages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->otherUpdates !== null) {
                    foreach ($object->otherUpdates as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Channels\ChannelParticipants::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Channels\ChannelParticipant::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\BotResults::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\PeerDialogs::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\TopPeers::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\HighScores::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageBlockCover::class:
                if ($object->cover !== null) {
                    $this->collect($object->cover, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageBlockEmbedPost::class:
                if ($object->blocks !== null) {
                    foreach ($object->blocks as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageBlockCollage::class:
                if ($object->items !== null) {
                    foreach ($object->items as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageBlockSlideshow::class:
                if ($object->items !== null) {
                    foreach ($object->items as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageBlockChannel::class:
                if ($object->channel !== null) {
                    if ($object->channel instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->channel);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageBlockOrderedList::class:
                if ($object->items !== null) {
                    foreach ($object->items as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageBlockDetails::class:
                if ($object->blocks !== null) {
                    foreach ($object->blocks as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentForm::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentFormStars::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentResult::class:
                if ($object->updates !== null) {
                    if ($object->updates instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->updates);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentReceipt::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\PaymentReceiptStars::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Phone\PhoneCall::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelAdminLogEventActionUpdatePinned::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelAdminLogEventActionEditMessage::class:
                if ($object->prevMessage !== null) {
                    $this->collect($object->prevMessage, $manager);
                }
                if ($object->newMessage !== null) {
                    $this->collect($object->newMessage, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelAdminLogEventActionDeleteMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelAdminLogEventActionStopPoll::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelAdminLogEventActionSendMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelAdminLogEvent::class:
                if ($object->action !== null) {
                    $this->collect($object->action, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Channels\AdminLogResults::class:
                if ($object->events !== null) {
                    foreach ($object->events as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\RecentMeUrlChatInvite::class:
                if ($object->chatInvite !== null) {
                    $this->collect($object->chatInvite, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Help\RecentMeUrls::class:
                if ($object->urls !== null) {
                    foreach ($object->urls as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Account\WebAuthorizations::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Account\AuthorizationForm::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageListItemBlocks::class:
                if ($object->blocks !== null) {
                    foreach ($object->blocks as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PageListOrderedItemBlocks::class:
                if ($object->blocks !== null) {
                    foreach ($object->blocks as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\Page::class:
                if ($object->blocks !== null) {
                    foreach ($object->blocks as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\UrlAuthResultRequest::class:
                if ($object->bot !== null) {
                    if ($object->bot instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->bot);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Auth\LoginTokenSuccess::class:
                if ($object->authorization !== null) {
                    $this->collect($object->authorization, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\InactiveChats::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\WebPageAttributeStory::class:
                if ($object->story !== null) {
                    $this->collect($object->story, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\VotesList::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\DialogFilterSuggested::class:
                if ($object->filter !== null) {
                    if ($object->filter instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->filter);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Help\PromoData::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stats\MegagroupStats::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\MessageViews::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\DiscussionMessage::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\MessageReplyHeader::class:
                if ($object->replyMedia !== null) {
                    $this->collect($object->replyMedia, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCall::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupParticipants::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ExportedChatInvites::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ExportedChatInvite::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ExportedChatInviteReplaced::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatInviteImporters::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatAdminsWithInvites::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Phone\JoinAsPeers::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\SponsoredMessage::class:
                if ($object->media !== null) {
                    $this->collect($object->media, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\SponsoredMessages::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\SearchResultsCalendar::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Channels\SendAsPeers::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Users\UserFull::class:
                if ($object->fullUser !== null) {
                    $this->collect($object->fullUser, $manager);
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\PeerSettings::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\MessageReactionsList::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\AttachMenuBots::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\AttachMenuBotsBot::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Help\PremiumPromo::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Account\EmailVerifiedLogin::class:
                if ($object->sentCode !== null) {
                    $this->collect($object->sentCode, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\MessageExtendedMedia::class:
                if ($object->media !== null) {
                    $this->collect($object->media, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\ForumTopics::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Account\AutoSaveSettings::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ExportedChatlistInvite::class:
                if ($object->filter !== null) {
                    if ($object->filter instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->filter);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ExportedInvites::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ChatlistInviteAlready::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ChatlistInvite::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ChatlistUpdates::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\StoryItem::class:
                if ($object->media !== null) {
                    $this->collect($object->media, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stories\AllStories::class:
                if ($object->peerStories !== null) {
                    foreach ($object->peerStories as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stories\Stories::class:
                if ($object->stories !== null) {
                    foreach ($object->stories as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\StoryViewPublicForward::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\StoryViewPublicRepost::class:
                if ($object->story !== null) {
                    $this->collect($object->story, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stories\StoryViewsList::class:
                if ($object->views !== null) {
                    foreach ($object->views as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stories\StoryViews::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PeerStories::class:
                if ($object->stories !== null) {
                    foreach ($object->stories as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stories\PeerStories::class:
                if ($object->stories !== null) {
                    $this->collect($object->stories, $manager);
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\WebPage::class:
                if ($object->webpage !== null) {
                    $this->collect($object->webpage, $manager);
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\CheckedGiftCode::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Premium\BoostsList::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Premium\MyBoosts::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PublicForwardMessage::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\PublicForwardStory::class:
                if ($object->story !== null) {
                    $this->collect($object->story, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stats\PublicForwards::class:
                if ($object->forwards !== null) {
                    foreach ($object->forwards as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\StoryReactionPublicForward::class:
                if ($object->message !== null) {
                    $this->collect($object->message, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\StoryReactionPublicRepost::class:
                if ($object->story !== null) {
                    $this->collect($object->story, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stories\StoryReactionsList::class:
                if ($object->reactions !== null) {
                    foreach ($object->reactions as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedDialogs::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\SavedDialogsSlice::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\QuickReplies::class:
                if ($object->messages !== null) {
                    foreach ($object->messages as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Account\ConnectedBots::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\DialogFilters::class:
                if ($object->filters !== null) {
                    foreach ($object->filters as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\ContactBirthdays::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\InvitedUsers::class:
                if ($object->updates !== null) {
                    if ($object->updates instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                        $manager->savePeerEntity($object->updates);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Account\BusinessChatLinks::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Account\ResolvedBusinessChatLinks::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\StarsTransaction::class:
                if ($object->extendedMedia !== null) {
                    foreach ($object->extendedMedia as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsStatus::class:
                if ($object->history !== null) {
                    foreach ($object->history as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\FoundStory::class:
                if ($object->story !== null) {
                    $this->collect($object->story, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Stories\FoundStories::class:
                if ($object->stories !== null) {
                    foreach ($object->stories as $item) {
                        $this->collect($item, $manager);
                    }
                }
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Bots\PopularAppBots::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Base\BotPreviewMedia::class:
                if ($object->media !== null) {
                    $this->collect($object->media, $manager);
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Bots\PreviewInfo::class:
                if ($object->media !== null) {
                    foreach ($object->media as $item) {
                        $this->collect($item, $manager);
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGifts::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\PreparedInlineMessage::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\ConnectedStarRefBots::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\SuggestedStarRefBots::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Users\Users::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Users\UsersSlice::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\UniqueStarGift::class:
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Messages\WebPagePreview::class:
                if ($object->media !== null) {
                    $this->collect($object->media, $manager);
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\SavedStarGifts::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Contacts\SponsoredPeers::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;

            case \ProtoBrick\MTProtoClient\Generated\Types\Payments\ResaleStarGifts::class:
                if ($object->chats !== null) {
                    foreach ($object->chats as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                if ($object->users !== null) {
                    foreach ($object->users as $item) {
                        if ($item instanceof \ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity) {
                            $manager->savePeerEntity($item);
                        }
                    }
                }
                return;
        }
    }
}