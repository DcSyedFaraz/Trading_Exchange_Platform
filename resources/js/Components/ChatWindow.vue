<!-- resources/js/Components/ChatWindow.vue -->

<template>
    <div class="chat-window">
        <div class="messages">
            <div v-for="message in messages" :key="message.id" :class="{
                sent: message.sender.id === currentUser.id,
                received: message.sender.id !== currentUser.id,
            }">
                <strong v-if="message.sender.id !== currentUser.id">
                    {{ message.sender.name }}
                </strong>
                <p>{{ message.message }}</p>
                <span>{{ message.created_at }}</span>
            </div>
        </div>
        <form @submit.prevent="sendMessage">
            <input v-model="newMessage" type="text" placeholder="Type your message..." required />
            <button type="submit">Send</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props: {
        chat: {
            type: Object,
            required: true,
        },
        currentUser: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            newMessage: '',
            messages: [...this.chat.messages],
        };
    },
    methods: {
        sendMessage() {
            if (this.newMessage.trim() === '') return;

            axios.post(route('chats.messages.store', { chat: this.chat.id }), {
                message: this.newMessage,
            })
                .then(response => {
                    // Append the new message to the messages array
                    this.messages.push(response.data.message);
                    // Clear the input field
                    this.newMessage = '';
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                    // Optionally, display an error message to the user
                });
        },
        reloadChatData() {
            // Use Inertia to reload the chat data
            this.$inertia.reload({
                preserveScroll: true, // Keeps the scroll position
            });
        },
        addMessage(message) {
            this.messages.push(message);
        },
        setupEcho() {
            if (window.Echo) {
                window.Echo.private(`chat.${this.chat.id}`)
                    .listen('MessageSent', (e) => { // Note the dot prefix
                        this.addMessage(e.message);
                    });

            }
        },
        leaveEcho() {
            if (window.Echo) {
                window.Echo.leave(`chat.${this.chat.id}`);
            }
        },
    },
    mounted() {
        this.setupEcho();
    },
    beforeDestroy() {
        this.leaveEcho();
    },
};
</script>

<style scoped>
.chat-window {
    flex: 1;
    display: flex;
    flex-direction: column;
    padding: 1rem;
}

.messages {
    flex: 1;
    overflow-y: auto;
    margin-bottom: 1rem;
}

.messages .sent {
    text-align: right;
}

.messages .received {
    text-align: left;
}

.messages p {
    display: inline-block;
    padding: 0.5rem;
    border-radius: 5px;
    background-color: #f1f1f1;
    margin: 0.5rem 0;
}

.messages .sent p {
    background-color: #d1e7dd;
}

form {
    display: flex;
}

form input {
    flex: 1;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 0.5rem;
}

form button {
    padding: 0.5rem 1rem;
    border: none;
    background-color: #4caf50;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}
</style>
