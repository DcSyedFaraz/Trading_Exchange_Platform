<!-- resources/js/Components/ChatSidebar.vue -->

<template>
    <div class="chat-sidebar">
        <h2>Chats</h2>
        <ul>
            <li v-for="chat in chats" :key="chat.id">
                <Link :href="route('chats.show', chat.id)">
                    <div class="chat-user">
                        <span>{{ chat.with_user.name }}</span>
                        <p v-if="chat.last_message">{{ chat.last_message.message }}</p>
                    </div>
                </Link>
            </li>
        </ul>
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
.chat-sidebar {
    width: 250px;
    border-right: 1px solid #ddd;
    padding: 1rem;
}

.chat-sidebar ul {
    list-style: none;
    padding: 0;
}

.chat-sidebar li {
    margin-bottom: 1rem;
}

.chat-user {
    cursor: pointer;
}
</style>
