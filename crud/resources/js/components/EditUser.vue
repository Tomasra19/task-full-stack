<template>
    <form v-on:submit.prevent="update()">
        <p>User Info</p>
        <div class="form-row">
            <div class="form-group col-md-2">
                <input v-model="user.name" name="Name" type="text" class="form-control" placeholder="Name"
                       v-validate="'required'">
                <span v-show="errors.has('Name')" class="text-danger">{{ errors.first('Name') }}</span>
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.username" name="User name" type="text" class="form-control" placeholder="User name"
                       v-validate="'required'">
                <span v-show="errors.has('User name')" class="text-danger">{{ errors.first('User name') }}</span>
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.email" name="Email" type="text" class="form-control" placeholder="Email"
                       v-validate="'required|email'">
                <span v-show="errors.has('Email')" class="text-danger">{{ errors.first('Email') }}</span>
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.phone" name="Phone" type="text" class="form-control" placeholder="Phone number"
                       v-validate="'required'">
                <span v-show="errors.has('Phone')" class="text-danger">{{ errors.first('Phone') }}</span>
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.website" type="text" class="form-control" placeholder="Website">
            </div>
        </div>
        <p>Address Info</p>
        <div class="form-row">
            <div class="form-group col-md-2">
                <input v-model="user.street" name="Street" type="text" class="form-control" placeholder="Street"
                       v-validate="'required'">
                <span v-show="errors.has('Street')" class="text-danger">{{ errors.first('Street') }}</span>
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.suite" type="text" class="form-control" placeholder="Suite">
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.city" name="City" type="text" class="form-control" placeholder="City"
                       v-validate="'required'">
                <span v-show="errors.has('City')" class="text-danger">{{ errors.first('City') }}</span>
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.zipcode" name="Zip code" type="text" class="form-control" placeholder="Zip code"
                       v-validate="'required'">
                <span v-show="errors.has('Zip code')" class="text-danger">{{ errors.first('Zip code') }}</span>
            </div>
        </div>
        <p>Geo</p>
        <div class="form-row">
            <div class="form-group col-md-3">
                <input v-model="user.lat" type="text" class="form-control" placeholder="lat">
            </div>
            <div class="form-group col-md-3">
                <input v-model="user.lng" type="text" class="form-control" placeholder="lng">
            </div>
        </div>
        <p>Company Info</p>
        <div class="form-row">
            <div class="form-group col-md-2">
                <input v-model="user.cName" name="Company name" type="text" class="form-control"
                       placeholder="Company Name" v-validate="'required'">
                <span v-show="errors.has('Company name')" class="text-danger">{{ errors.first('Company name') }}</span>
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.catchPhrase" type="text" class="form-control" placeholder="Catch Phrase">
            </div>
            <div class="form-group col-md-2">
                <input v-model="user.bs" type="text" class="form-control" placeholder="Bs">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.user_id = id;
            axios.get('/api/user/' + id)
                .then(res => res.data)
                .then(res => {
                    app.user = res.data;
                })
                .catch(err => console.log(err));
        },
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
                user_id: null,
            }
        },

        methods: {
            update() {
                let app = this;
                var newUser = app.user;
                app.$validator.validateAll().then(res => {
                    if (res) {
                        axios.patch(`/api/user/` + app.user_id, newUser)
                            .then(function (resp) {
                                app.$router.push('/');
                            })
                            .catch(function (resp) {
                                console.log(resp);
                                alert("Could not update user");
                            });
                    } else {
                        //
                    }
                });
            }
        }
    }
</script>

<style>

</style>