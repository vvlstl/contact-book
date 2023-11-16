<template>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="g-3 mt-5 bg-dark-subtle rounded-3 p-4 w-50">
                <div class="modal-header">
                    <h4 class="modal-title">Новый контакт</h4>
                </div>
                <div class="row-cols-12 g-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Имя" v-model="name" required :class="{ 'is-invalid': !isValid }">
                        <div class="invalid-feedback">
                            Пожалуйста, введите имя.
                        </div>
                        <input type="text" class="form-control mt-2" placeholder="Фамилия" v-model="surname">
                        <input type="text" class="form-control mt-2" placeholder="Отчество" v-model="patronymic">
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
                    <input :disabled="!isValid" @click.prevent="newContact" type="submit" class="btn btn-primary" value="Сохранить">
                    <router-link :to="{name: 'contact.index'}" class="btn btn-primary mx-2">Назад</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "CreateComponent",

    data(){
        return{
            surname: null,
            name: null,
            patronymic: null,
            phone: null,
            email: null,
            birthday: null
        }
    },
    methods:{
        newContact(){
            axios.post('/api/new',
                {surname: this.surname,
                      name: this.name,
                      patronymic:this.patronymic,
                      phone: this.phone,
                      email: this.email,
                      birthday: this.birthday})

                .then(res=>{
                    this.surname = null
                    this.name = null
                    this.patronymic = null
                    this.phone = null
                    this.email = null
                    this.birthday = null
                    this.$router.push({name: 'contact.index'})
                })

                .catch(error => {
                    console.error(error);
                });
        }
    },
    computed: {
        isValid() {
            return this.name&&this.phone;
        },
    }
}
</script>
