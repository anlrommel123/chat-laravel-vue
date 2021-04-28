<template>
    <ul class="list-group">
        <li class="list-group-item" v-for="(message, index) in messages" :key="index">
            <div class="message-name">
                <strong>{{ message.user.name }}</strong>
            </div>
            <div class="message-body">
                {{ message.message }}
            </div>
        </li>
    </ul>
</template>

<style scoped>
    .list-group {
        height: 400px;
        overflow: auto;
    }
</style>

<script>
export default {
    props: ['messages']
}
</script>