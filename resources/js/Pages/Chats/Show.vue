<!-- resources/js/Pages/Chats/Show.vue -->

<template>
    <div class="card-1">
        <div class="row g-0">
            <div class="col-12 col-lg-5 col-xl-4 border-right side">
                <ChatSidebar :chats="chats" />
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
    computed: {
        authUser() {
            return this.auth.user;
        },
    },
    methods: {
        handleMessageSent(message) {
            this.updateLastMessage(this.chat.id, message);
        },
        handleMessageReceived(message) {
            this.updateLastMessage(this.chat.id, message);
        },
        handleChatViewed(chatId) {
            if (chatId === this.chat.id) {
                const chatIndex = this.chats.findIndex(c => c.id === chatId);
                if (chatIndex !== -1) {
                    // Directly modify the chats array in Vue 3
                    this.chats[chatIndex] = {
                        ...this.chats[chatIndex],
                        unread_count: 0,
                    };
                }
            }
        },
        updateLastMessage(chatId, message) {
            if (!message || typeof message.message !== 'string' || !message.created_at) {
                console.error('Invalid message object:', message);
                return;
            }
            const chatIndex = this.chats.findIndex(c => c.id === chatId);
            if (chatIndex !== -1) {
                // Directly modify the chats array in Vue 3
                this.chats[chatIndex] = {
                    ...this.chats[chatIndex],
                    last_message: {
                        message: message.message,
                        created_at: message.created_at,
                    },
                    unread_count: this.chats[chatIndex].unread_count + 1,
                };
            }
        }

    },
};
</script>

<style scoped></style>
