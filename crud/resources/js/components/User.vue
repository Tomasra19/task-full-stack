<template>
    <div class="card">
        <div class="card-body">
            <h3>User - {{user.username}}</h3>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h4>User Info</h4></li>
                        <li class="list-group-item">User Name: <strong>{{user.username}}</strong></li>
                        <li class="list-group-item">Name: <strong>{{user.name}}</strong></li>
                        <li class="list-group-item">Email: <strong>{{user.email}}</strong></li>
                        <li class="list-group-item">Phone: <strong>{{user.phone}}</strong></li>
                        <li class="list-group-item">WebSite: <strong>{{user.website}}</strong></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h4>Address Info</h4></li>
                        <li class="list-group-item">Street: <strong>{{user.street}}</strong></li>
                        <li class="list-group-item">Suite: <strong>{{user.suite}}</strong></li>
                        <li class="list-group-item">City: <strong>{{user.city}}</strong></li>
                        <li class="list-group-item">Zip code: <strong>{{user.zipcode}}</strong></li>
                        <li class="list-group-item">Lat: <strong>{{user.lat}}</strong></li>
                        <li class="list-group-item">Lng: <strong>{{user.lng}}</strong></li>
                    </ul>
                </div>
            </div>
            <h4>Company Info</h4>
            <div class="row">
                <div class="col-md-3">
                    <p class="card-text">Company Name: <strong>{{user.cName}}</strong></p>
                </div>
                <div class="col-md-3">
                    <p class="card-text">Catch Phrase: <strong>{{user.catchPhrase}}</strong></p>
                </div>
                <div class="col-md-3">
                    <p class="card-text">Bs: <strong>{{user.bs}}</strong></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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
            }
        },

        created() {
            this.getUser();
        },

        methods: {
            getUser() {
                var userId = this.$route.params.id;
                axios.get('/api/user/'+ userId)
                    .then(res => res.data)
                    .then(res => {
                        this.user = res.data;
                    })
                    .catch(err => console.log(err));
            }
        }
    }
</script>

<style>

</style>