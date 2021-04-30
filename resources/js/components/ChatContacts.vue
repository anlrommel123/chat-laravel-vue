<template>
    <div class="card">
        <div class="card-header">
            <input type="text" class="form-control" placeholder="Search contact" />
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="(contact, index) in contacts" :key="index" @click="selectContact(contact.id)">
                    {{ contact.name }}
                </li>
            </ul>
        </div>
  </div>
</template>

<script>
export default {
    props: ['id', 'contacts'],

    methods: {
        selectContact(to_user_id) {
            
            this.$emit('selectedcontact', {
                user_id: this.id,
                to_user_id: to_user_id
            })
        }
    }
}
</script>