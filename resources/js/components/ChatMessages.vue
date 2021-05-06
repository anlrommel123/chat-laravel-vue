<template>
    <div id="chat-form">
        <div>
            <div class="d-flex flex-row bd-highlight mb-3 message-body" v-for="(message, index) in messages" :class="{ 'flex-row-reverse': id === message.user.id }" :key="index">
                <div class="p-1"><img v-if="id != message.user.id" class="rounded" src="images/avatar-5.png" alt="" width="30"></div>
                <div class="p-2" :class="id === message.user.id ? 'from-me' : 'to-me' ">{{ message.message }}</div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    #chat-form {
        height: 300px;
        overflow: auto;
        display: flex;
        flex-direction: column-reverse;
    }

    .from-me {
        border-radius: 10px;
        background-color: #1e88e5 !important;
        color: #fff;
        max-width: 60%;
    }

    .to-me {
        border-radius: 10px;
        background-color: #d6d8d9 !important;
        color: #000;
        max-width: 60%;
    }
</style>

<script>
export default {
    props: ['messages', 'id'],
}
</script>