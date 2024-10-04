<!-- resources/js/Pages/Chats/Show.vue -->

<template>
    <div class="card-1">
        <div class="row g-0">
            <div class="col-12 col-lg-5 col-xl-4 border-right side">
                <ChatSidebar :chats="localChats" :current-chat-id="chat.id" />
            </div>
            <div class="col-12 col-lg-7 col-xl-8">
                <ChatWindow :chat="chat" :current-user="authUser" @message-sent="handleMessageSent"
                    @message-received="handleMessageReceived" @chat-viewed="handleChatViewed" />
            </div>
        </div>
    </div>
</template>


<script>
import ChatSidebar from '@/Components/ChatSidebar.vue';
import ChatWindow from '@/Components/ChatWindow.vue';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;

export default {
    components: {
        ChatSidebar,
        ChatWindow,
    },
    props: {
        chat: {
            type: Object,
            required: true,
        },
        chats: {
            type: Array,
            required: true,
        },
        auth: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            localChats: JSON.parse(JSON.stringify(this.chats)),
            chatChannels: [],
        };
    },
    watch: {
        chats: {
            handler(newChats) {
                this.localChats = JSON.parse(JSON.stringify(newChats));
                this.setupEchoListeners(); // Re-setup listeners if chats change
            },
            deep: true,
        },
    },
    computed: {
        authUser() {
            return this.auth.user;
        },
    },
    methods: {
        handleMessageSent(message) {
            console.log(message,this.chat.id,'ss');
            this.updateLastMessage(this.chat.id, message);
        },
        handleMessageReceived(message) {
            this.updateLastMessage(this.chat.id, message);
        },
        handleChatViewed(chatId) {
            if (chatId === this.chat.id) {
                const chatIndex = this.localChats.findIndex(c => c.id === chatId);
                if (chatIndex !== -1) {
                    this.localChats[chatIndex] = {
                        ...this.localChats[chatIndex],
                        unread_count: 0,
                    };
                }
            }
        },
        updateLastMessage(chatId, message) {
            console.log(message,chatId);

            if (!message) {
                console.error('Invalid message object:', message);
                return;
            }
            const chatIndex = this.localChats.findIndex(c => c.id === chatId);
            if (chatIndex !== -1) {
                const isCurrentChat = chatId === this.chat.id;
                const unreadCount = isCurrentChat ? 0 : this.localChats[chatIndex].unread_count + 1;
                this.localChats[chatIndex] = {
                    ...this.localChats[chatIndex],
                    last_message: {
                        message: message,
                        // created_at: message.created_at,
                    },
                    unread_count: unreadCount,
                };
            }
        },

        setupEchoListeners() {
            if (!window.Echo) {
                window.Echo = new Echo({
                    broadcaster: 'pusher',
                    key: import.meta.env.VITE_PUSHER_APP_KEY,
                    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
                    wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
                    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
                    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
                    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
                    enabledTransports: ['ws', 'wss'],
                    encrypted: true,
                    authEndpoint: '/broadcasting/auth',
                    auth: {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    },
                });
            }

            // Leave existing channels to prevent duplicate listeners
            if (this.chatChannels.length > 0) {
                this.chatChannels.forEach(channel => {
                    window.Echo.leaveChannel(channel.name);
                });
            }

            // Set up new channels
            this.chatChannels = this.localChats.map(chat => {
                const channel = window.Echo.private(`chat.${chat.id}`);
                channel.listen('.MessageSent', (e) => {
                    console.log('MessageSent event received:', e);
                    // Update last message in localChats
                    this.updateLastMessage(chat.id, e.message);
                });
                return channel;
            });
        },
    },
    mounted() {
        this.setupEchoListeners();
    },
    beforeUnmount() {
        if (this.chatChannels.length > 0) {
            this.chatChannels.forEach(channel => {
                window.Echo.leaveChannel(channel.name);
            });
        }
    },
};
</script>

<style scoped></style>
