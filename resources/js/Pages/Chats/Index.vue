<!-- resources/js/Pages/Chats/Index.vue -->

<template>
    <div class="chats-page">
        <ChatSidebar :chats="chats" />
        <div class="chat-content">
            <p>Select a chat to start messaging.</p>
        </div>
    </div>
</template>

<script>
import ChatSidebar from '@/Components/ChatSidebar.vue';

export default {
    components: {
        ChatSidebar,
    },
    props: {
        chats: {
            type: Array,
            required: true,
        },
    },
};
</script>

<style scoped>
.chats-page {
    display: flex;
    height: 100vh;
}

.chat-content {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: #666;
}
</style>
