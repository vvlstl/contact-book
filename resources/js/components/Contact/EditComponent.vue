<template>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="g-3 mt-5 bg-dark-subtle rounded-3 p-4 w-50">
                <div class="modal-header">
                    <h4 class="modal-title">Изменить контакт</h4>
                </div>
                <div class="row-cols-12 g-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Имя" v-model="name" required :class="{ 'is-invalid': !isValid }">
                        <div class="invalid-feedback">
                            Пожалуйста, введите имя.
                        </div>
                    </div>
                    <div class="col">
                        <label for="birthday" class="form-label mt-4">Дата рождения</label>
                        <input type="date" class="form-control" id="birthday" placeholder="Дата рождения" v-model="birthday">
                    </div>
                </div>

                <div class="row-cols-12 g-3">
                    <div class="col">
                        <label for="phone" class="form-label mt-4">Телефон</label>
                        <input type="text" class="form-control" id="phone" v-model="phone" required :class="{ 'is-invalid': !isValid }">
                        <div class="invalid-feedback">
                            Пожалуйста, введите номер.
                        </div>
                    </div>
                    <div class="col">
                        <label for="inputEmail4" class="form-label mt-4">Эл. адрес</label>
                        <input type="email" class="form-control" v-model="email" id="inputEmail4">
                    </div>
                </div>
                <div class="col mt-4">
                    <input :disabled="!isValid" @click.prevent="updateContact" type="submit" class="btn btn-primary" value="Сохранить">
                    <router-link :to="{name: 'contact.show'}" class="btn btn-primary mx-2">Назад</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'EditComponent',

    data(){
        return{
            name: null,
            phone: null,
            email: null,
            birthday: null
        }
    },

    mounted() {
        this.getContact()
    },

    methods:{
        getContact(){
            axios.get(`/api/contact/${this.$route.params.id}`)
                .then(res=>{
                    this.name = res.data.data.name
                    this.phone = res.data.data.phone
                    this.email = res.data.data.email
                    this.birthday = res.data.data.birthday
                })
        },

        updateContact(){
            axios.patch(`/api/contact/${this.$route.params.id}`, {
                name: this.name,
                phone: this.phone,
                email: this.email,
                birthday: this.birthday
            })
                .then(res=>{
                    this.$router.push({name: 'contact.index'})
                })
        }
    },
    computed: {
        isValid() {
            return this.name&&this.phone;
        },
    }

}
</script>
