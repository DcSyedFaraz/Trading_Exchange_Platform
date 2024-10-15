<!-- resources/js/Components/ChatSidebar.vue -->
<template>
    <div>
        <a :href="route('marketplace')" class="market-d">
            <i class="fas fa-shopping-cart mr-2"></i> <!-- Use the appropriate icon name here -->
            Marketplace
        </a>

        <div v-for="chat in chats" :key="chat.id" :class="['chat-item', { 'current-chat': chat.id === currentChatId }]">
            <Link :href="route('chats.show', chat.id)" class="user-div">
            <div class="d-flex align-items-center">
                <img v-if="chat.product.image?.path"
                :src="'/storage/' + chat.product.image.path" class="rounded-circle mr-1" alt="Vanessa Tucker">
                <div class="content-inner">
                    <h3>{{ chat.with_user.name }}</h3>
                    <p v-if="chat.product">Regarding: {{ chat.product.name }}</p>
                    <p v-if="chat.last_message" class="d-flex justify-between">
                        <span v-if="chat.last_message.message?.message">
                            {{ chat.last_message.message.message }}
                        </span>
                        <span v-else>
                            {{ chat.last_message.message }}
                        </span>
                        <span v-if="chat.unread_count > 0" class="badge bg-danger">{{ chat.unread_count }}</span>
                    </p>
                </div>
            </div>
            </Link>
        </div>
    </div>
</template>


<script>
export default {
    props: {
        chats: {
            type: Array,
            required: true,
        },
        currentChatId: {
            type: [Number, String], // Depending on how your IDs are defined
        },
    },
};
</script>
<!-- resources/js/Components/ChatSidebar.vue -->
<style scoped>
.chat-item {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.current-chat {
    border: 2px solid #f0f8ff;
    /* Or any style you prefer */
    /* Additional styles to highlight the current chat */
}
</style>
