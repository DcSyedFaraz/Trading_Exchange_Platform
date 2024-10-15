<!-- resources/js/Components/ChatWindow.vue -->

<template>
    <div class="message-main">
        <div class="py-2 border-bottom d-none d-lg-block chat-header">
            <div class="d-flex align-items-center py-1">
                <div class="position-relative">
                    <img v-if="chat.product.image?.path" :src="'/storage/' + chat.product.image.path"
                        class="rounded-circle mr-1" alt="Product image for {{ chat.product.name }}" />

                </div>
                <div class="flex-grow-1 username-main pl-3 mt-2">
                    <h4>{{ chat.product.name }}</h4>
                    <p>{{ chat.product.description }}</p>
                </div>
                <div class="all-btns">
                    <button class="inte-btn" id="interested">Interested</button>

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
            <div class="chat-messages p-4" ref="chatMessages">
                <div v-for="message in messages" :key="message.id" :class="{
                    chat_message_left: message.sender.id !== currentUser.id,
                    chat_message_right: message.sender.id === currentUser.id,
                    'message-sending': message.status === 'sending',  // Apply dim styling when sending
                    'message-sent': message.status === 'sent' // Apply normal styling when sent
                }" class="pb-4">

                    <div v-if="message.sender.id !== currentUser.id">
                        {{ message.sender.name }}
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
            <form @submit.prevent="sendMessage">
                <div class="input-group">

                    <input type="text message-box-input" v-model="newMessage" class="form-control"
                        placeholder="Type your message">
                    <button class="send-btn"><i class="fa-regular fa-location-arrow-up"></i></button>
                </div>
            </form>
        </div>
    </div>

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
            sendingMessages: [],
        };
    },
    methods: {
        scrollToBottom() {
            const container = this.$refs.chatMessages;
            container.scrollTop = container.scrollHeight;
        },
        sendMessage() {
            if (this.newMessage.trim() === '') return;

            const tempMessage = {
                id: Date.now(), // Temporary ID
                message: this.newMessage,
                sender: this.currentUser, // Set the sender as the current user
                status: 'sending', // Mark message as sending
            };

            // Push message into the array
            this.messages.push(tempMessage);
            const messageText = this.newMessage;
            this.newMessage = '';
            this.$nextTick(() => this.scrollToBottom());

            axios.post(route('chats.messages.store', { chat: this.chat.id }), {
                message: messageText,
            })
                .then(response => {
                    const sentMessage = this.messages.find(msg => msg.id === tempMessage.id);
                    if (sentMessage) {
                        sentMessage.status = 'sent'; // Update status on successful send
                    }
                    this.$nextTick(() => this.scrollToBottom());
                    this.$emit('message-sent', response.data.message);
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                });
        },

        addMessage(message) {
            if (message.sender.id === this.currentUser.id) {
                return;
            }
            this.messages.push(message);
            this.$nextTick(() => this.scrollToBottom());
            console.log(message);

            this.$emit('message-received', message);
        },
        setupEcho() {


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
        this.$nextTick(() => this.scrollToBottom());
        this.$emit('chat-viewed', this.chat.id);
    },
    beforeUnmount() {
        this.leaveEcho();
    },
};
</script>

<style scoped>
.message-sending {
    opacity: 0.5;
    color: gray;
}

.message-sent {
    opacity: 1;
    color: black;
}
</style>
