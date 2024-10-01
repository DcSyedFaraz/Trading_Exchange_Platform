<!-- resources/js/Pages/Chats/Show.vue -->

<template>
    <!-- <div class="chat-show-page">
        <ChatSidebar :chats="chats" />
    </div> -->
    <div class="card-1">
        <div class="row g-0">
            <div class="col-12 col-lg-5 col-xl-4 border-right side">
                <Link :href="route('chats.show', chat.id)" class="user-div" v-for="chat in chats" :key="chat.id">
                <div class="d-flex align-items-center">
                    <!-- <img src="./assets/images/chat-screen/user1.png" class="rounded-circle mr-1"
                                        alt="Vanessa Tucker"> -->
                    <div class="content-inner">
                        <h3>{{ chat.with_user.name }}</h3>
                        <p v-if="chat.last_message">{{ chat.last_message.message }}</p>
                    </div>
                </div>
                </Link>

                <hr class="d-block d-lg-none mt-1 mb-0">
            </div>
            <div class="col-12 col-lg-7 col-xl-8">

                <ChatWindow :chat="chat" :current-user="authUser" />
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
};
</script>

<style scoped>
.chat-show-page {
    display: flex;
    height: 100vh;
}
</style>
