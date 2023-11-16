<template>
    <header class="py-3 mb-3 border-bottom">
    <div class="container">
    <div class="container-fluid d-flex justify-content-between">
        <router-link :to="{name: 'contact.index'}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4">Книга Контактов</span>
        </router-link>

        <div class="w-75 me-3" role="search">
            <input type="search" class="form-control" placeholder="Поиск" aria-label="Search" v-model="searchQuery" @input="handleSearch">
            <div class="results w-50 position-absolute" v-if="showResults">
                <ul class="list-group" id="contact-list">
                    <li @click="clearSearchQuery" v-for="contact in filteredContacts" :key="contact.id" class="list-group-item bg-secondary">
                        <router-link :to="{name: 'contact.show', params: {id: contact.id}}" class="text-white text-decoration-none">{{ contact.name }}</router-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex-shrink-0">
            <a @click.prevent href="#" class="d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                    I'm
                </div>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li><a @click.prevent class="dropdown-item" href="#">Settings</a></li>
                <li><a @click.prevent  class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a @click.prevent class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
    </div>
    </header>
    <router-view></router-view>
</template>

<script>
export default {
    name: 'App',
    data() {
        return {
            searchQuery: '',
            contacts: [],
        };
    },
    computed: {
        filteredContacts() {
            const searchTerm = this.searchQuery.trim().toLowerCase();
            if (!searchTerm) return this.contacts;
            return this.contacts.filter(contact => contact.name.toLowerCase().includes(searchTerm));
        },
        showResults() {
            return this.filteredContacts.length > 0 && this.searchQuery.length > 0;
        },
    },
    methods: {
        loadContacts() {
            axios
                .get('/api/contacts')
                .then((response) => {
                    this.contacts = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        clearSearchQuery(){
            this.searchQuery = '';
        }
    },
    watch: {
        searchQuery() {
            if (this.searchQuery.trim() === '') {
                this.contacts = [];
                return;
            }
            this.loadContacts();
        },
    },
};
</script>

<style>
.results {
    z-index: 999;
}
</style>



