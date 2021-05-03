<template>
    <div class="card">
        <div class="card-header">
            <input type="text" v-model="name" @keyup="searchContact" class="form-control" placeholder="Search contact" />
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="(contact, index) in contacts" :key="index" @click="selectContact(contact.id, contact.name)">
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
</style>

<script>
export default {
    props: ['id'],

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