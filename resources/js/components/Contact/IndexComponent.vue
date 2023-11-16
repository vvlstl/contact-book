<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3 order-md-1">
                <router-link :to="{name: 'contact.new'}" class="btn btn-lg btn-primary mb-3 mb-md-0">Добавить контакт</router-link>
            </div>
            <div class="col-md-9 order-md-2">
                <ul class="list-group">
                    <li v-for="contact in contacts" class="card mb-2">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                {{ contact.name[0] }}
                            </div>
                            <div class="flex-grow-1 px-2">
                                <router-link :to="{ name: 'contact.show', params: { id: contact.id } }" class="text-decoration-none">
                                    {{ contact.name }}
                                </router-link>

                            </div>
                            <div class="d-flex align-items-center">
                                    <router-link :to="{name: 'contact.edit', params: {id: contact.id}}" class="btn badge btn-primary rounded-pill text-decoration-none">Изменить</router-link>
                                    <a @click.prevent="deleteContact(contact.id)" class="btn badge btn-danger rounded-pill">Удалить</a>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "IndexComponent",

    data() {
        return {
            contacts: null,
        };
    },

    mounted() {
        this.getContacts();
    },

    methods: {
        getContacts() {
            axios.get('/api/')
                .then(res => {
                    this.contacts = res.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        deleteContact(id) {
            axios.delete(`/api/contact/${id}`)
                .then(res => {
                    this.getContacts();
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
