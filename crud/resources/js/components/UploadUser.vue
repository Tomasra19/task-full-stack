<template>
    <div class="card">
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">JSONURL</label>
                </div>
                <select v-model="jsonUrl" class="custom-select" id="inputGroupSelect01">
                    <option disabled>Choose URL</option>
                    <option v-for="url in urls" v-bind:value="url">
                        {{url}}
                    </option>
                </select>
            </div>
            <button @click="upload()" type="button" class="btn btn-dark">Upload</button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                results: [],
                jsonUrl: '',
                urls: [
                    'https://jsonplaceholder.typicode.com/users/1',
                    'https://jsonplaceholder.typicode.com/users/2',
                    'https://jsonplaceholder.typicode.com/users/3',
                    'https://jsonplaceholder.typicode.com/users/4',
                    'https://jsonplaceholder.typicode.com/users/5',
                    'https://jsonplaceholder.typicode.com/users/6',
                    'https://jsonplaceholder.typicode.com/users/7',
                    'https://jsonplaceholder.typicode.com/users/8',
                    'https://jsonplaceholder.typicode.com/users/9',
                    'https://jsonplaceholder.typicode.com/users/10'
                ]
            }
        },
        methods: {
            upload() {
                var app = this;
                axios.get(app.jsonUrl)
                    .then(response => {
                        app.results = response.data;
                        console.log(app.results);
                        axios.post(`/api/user`, app.results)
                            .then(function (resp) {
                                app.$router.push({name: 'users'});
                            })
                            .catch(function (resp) {
                                console.log(resp);
                                alert("Could not upload user, user might already exists");
                            });
                    });
            }
        }
    }
</script>
