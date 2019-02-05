<template>
    <div>
        <h2>Users</h2>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="getUsers(pagination.prev_page_url)">Previous</a>
                </li>
                <li class="page-item disabled text-dark">
                    <a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                </li>
                <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]">
                    <a class="page-link" href="#" @click="getUsers(pagination.next_page_url)">Next</a>
                </li>
            </ul>
        </nav>
        <div class="card card-body mb-2" v-for="user in users" v-bind:key="user.id">
            <div class="card-title">
                <h3>{{user.name}}</h3>
            </div>
            <div>
                <p>User name: <strong>{{user.username}}</strong></p>
                <p>Email: <strong>{{user.email}}</strong></p>
                <p>Phone: <strong>{{user.phone}}</strong></p>
                <p>Company name: <strong>{{user.cName}}</strong></p>
                <router-link :to="{ name: 'user', params: {id: user.id}  }" class="btn btn-info">
                    Description
                </router-link>
                <router-link :to="{ name: 'editUser', params: {id: user.id}  }" class="btn btn-primary">
                    Edit
                </router-link>
                <button type="button" class="btn btn-danger" @click="deleteUser(user.id, user.username)">Delete</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                users: [],
                user: {
                    id: '',
                    name: '',
                    username: '',
                    email: '',
                    street: '',
                    suite: '',
                    city: '',
                    zipcode: '',
                    lat: '',
                    lng: '',
                    phone: '',
                    website: '',
                    cName: '',
                    catchPhrase: '',
                    bs: '',
                },
                user_id: '',
                pagination: {},
            }
        },

        created() {
            this.getUsers();
        },

        methods: {
            getUsers(page_url) {
                let vm = this;
                page_url = page_url || '/api/user';
                axios.get(page_url)
                    .then(res => res.data)
                    .then(res => {
                        this.users = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },

            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };
                this.pagination = pagination;
            },

            deleteUser(id, name) {
                if (confirm('Are you sure?')) {
                    axios.delete('api/user/' + id)
                        .then(res => res.data)
                        .then(data => {
                            alert('User - ' + name + ' deleted');
                            this.getUsers();
                        }).catch(err => console.log(err));
                }
            }
        }
    }
</script>