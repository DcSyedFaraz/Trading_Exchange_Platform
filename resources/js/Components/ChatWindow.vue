<!-- resources/js/Components/ChatWindow.vue -->

<template>
    <div class="message-main">
        <div class="py-2 border-bottom d-none d-lg-block chat-header">
            <div class="d-flex align-items-center py-1">
                <div class="position-relative">
                    <img src="./assets/images/chat-screen/chat-1.png" class="rounded-circle mr-1" alt="P D P">
                </div>
                <div class="flex-grow-1 username-main pl-3">
                    <h4>P D P</h4>
                    <p>lorem ipsum dolor sit amet elit.</p>
                </div>
                <div class="all-btns">
                    <button class="inte-btn" id="interested">Interested</button>
                    <a href="#" class="inte-btn1"><i class="fa-light fa-video"></i></a>
                    <a href="#" class="inte-btn1"><i class="fa-light fa-phone"></i></a>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Block</a></li>
                            <li><a class="dropdown-item" href="#">Report</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-relative">
            <div class="chat-messages p-4">

                <div v-for="message in messages" :key="message.id" :class="{
                    chat_message_left: message.sender.id !== currentUser.id,
                    chat_message_right: message.sender.id === currentUser.id,
                }" class=" pb-4">
                    <div v-if="message.sender.id !== currentUser.id">
                        {{ message.sender.name }}
                        <!-- <img src="assets/images/chat-screen/chat-1.png" class="rounded-circle mr-1" alt="P D P"> -->
                    </div>
                    <div :class="{
                        chat_opp: message.sender.id !== currentUser.id,
                        chat_opp1: message.sender.id === currentUser.id,
                    }">
                        {{ message.message }}
                    </div>
                </div>



            </div>
        </div>

        <div class="message-box">
            <div class="input-group">
                <input type="text" v-model="newMessage" class="form-control" placeholder="Type your message">
                <button class="send-btn" @click="sendMessage"><i class="fa-regular fa-location-arrow-up"></i></button>
            </div>
        </div>
    </div>
    <!-- <div class="chat-window">
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
    </div> -->
</template>

<script>
import axios from 'axios';
import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

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
                    // this.messages.push(response.data.message);
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
                        // Include any additional headers if necessary
                    },
                },
            });
            if (window.Echo) {
                window.Echo.private(`chat.${this.chat.id}`)
                    .listen('.MessageSent', (e) => {
                        console.log('MessageSent event received:', e);
                        this.addMessage(e);
                    });
            } else {
                console.error('Laravel Echo is not initialized.');

            }
            console.log(window.Echo.private(`chat.${this.chat.id}`));
            // Check if Echo is instantiated correctly
        },
        leaveEcho() {
            if (window.Echo) {
                window.Echo.leave(`private-chat.${this.chat.id}`);
            }
        },
    },
    mounted() {
        this.setupEcho();
    },
    beforeUnmount() {
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
