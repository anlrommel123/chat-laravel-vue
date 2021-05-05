<template>
    <div class="card">
        <div class="card-header">
            <input type="text" v-model="name" @keyup="searchContact" class="form-control" placeholder="Search contact" />
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="(contact, index) in contacts" :key="index" @click="selectContact(contact.id, contact.name)">
                    <img class="rounded" src="images/avatar-5.png" alt="" width="30">&nbsp;
                    {{ contact.name }}
                </li>
                
                <li v-show="!this.contacts.length">
                    No results found
                </li>
            </ul>
        </div>
  </div>
</template>

<style scoped>
    .list-group {
        height: 375px;
        overflow: auto;
    }

    .list-group-item {
        border: none !important;
    }

    .list-group-item:hover {
        cursor: pointer;
    }
</style>

<script>
export default {
    props: ['id', 'messages', 'selected'],

    data() {
        return {
            name: null,
            contacts: []
        }
    },
    
    mounted() {
        this.getContacts()
    },

    methods: {
        selectContact(to_user_id, to_user_name) {
            
            this.$emit('selectedcontact', {
                user_id: this.id,
                to_user_id: to_user_id,
                to_user_name: to_user_name
            })

            Echo.private(`chat.${this.selected.user_id}`)
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                })
            });
        },

        searchContact() {
            axios.get('./searchContact', {
                params: {
                    name: this.name
                }
            })
            .then((resp) => {
                this.contacts = resp.data
            })
        },

        getContacts() {
            axios.get('./getContacts')
            .then(resp => {
                this.contacts = resp.data
            })
        }

    }
}
</script>