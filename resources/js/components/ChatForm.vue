<template>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="message" placeholder="Click to write a message" v-model="newMessage" @keyup.enter="sendMessage" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="button-addon2" @click="sendMessage">Send</button>
            </div>
    </div>
</template>

<script>
export default {
    props: ['user'],

    data() {
        return {
            newMessage: ''
        }
    },

    methods: {
        sendMessage() {
            this.$emit('messagesent', {
                user: this.user,
                message: this.newMessage
            });

            this.newMessage = ''
        }
    }
}
</script>