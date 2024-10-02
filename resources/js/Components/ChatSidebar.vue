<!-- resources/js/Components/ChatSidebar.vue -->

<template>
    <div>
        <div v-for="chat in chats" :key="chat.id" class="chat-item">
            <Link :href="route('chats.show', chat.id)" class="user-div">
            <div class="d-flex align-items-center">
                <!-- Optional: User or product image -->
                <div class="content-inner">
                    <h3>{{ chat.with_user.name }}</h3>
                    <p v-if="chat.product">Regarding: {{ chat.product.name }}</p>
                    <p v-if="chat.last_message">{{ chat.last_message.message }}</p>
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
    },
};
</script>

<style scoped>
.chat-item {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}
</style>
