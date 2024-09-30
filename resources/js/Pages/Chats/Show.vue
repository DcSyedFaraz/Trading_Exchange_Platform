<!-- resources/js/Pages/Chats/Show.vue -->

<template>
    <div class="chat-show-page">
        <ChatSidebar :chats="chats" />
        <ChatWindow :chat="chat" :current-user="authUser" />
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
};
</script>

<style scoped>
.chat-show-page {
    display: flex;
    height: 100vh;
}
</style>
