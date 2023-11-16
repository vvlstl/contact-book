<template>
    <div class="container mt-4">
        <div v-if="contact" class="row justify-content-center">
            <div class="col-md-auto">
                <div class="text-center rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; font-size: 32px;">
                    {{ contact.name[0] }}
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h3 class="mb-0">{{contact.name}}</h3>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div>
                            <router-link :to="{name: 'contact.edit', params: {id: contact.id}}" class="btn btn-secondary me-2">Изменить</router-link>
                            <a @click.prevent="deleteContact(contact.id)" class="btn btn-secondary me-2" type="submit">Удалить</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <p><i class="bi bi-envelope-fill me-2"></i> Email: {{contact.email}}</p>
                    <p><i class="bi bi-phone-fill me-2"></i> Телефон: {{contact.phone}}</p>
                    <p><i class="bi bi-geo-alt-fill me-2"></i> День рождения: {{contact.birthday}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ShowComponent',
    data() {
        return {
            contact: null
        };
    },
    mounted() {
        this.getContact()
    },
    methods: {
        getContact() {
            axios.get(`/api/contact/${this.$route.params.id}`)
                .then(res => {
                    this.contact = res.data.data;
                    console.log(this.contact)
                })
                .catch(error => {
                    console.error(error);
                });
        },
        deleteContact(id) {
            axios.delete(`/api/contact/${id}`)
                .then(res => {
                    this.$router.push({name: 'contact.index'})
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }

}
</script>
