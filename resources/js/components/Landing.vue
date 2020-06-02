<script>
    export default {
        name: 'Landing',
        data() {
            return {
                movies: [],
                loading: true,
                errored: false,
                type: 'random',
                loadedMovies: []
            }
        },
        mounted() {
            axios.get(this.endpoint('get'))
                .then(response => {
                    this.movies = response.data;
            }).catch(error => {
                this.errored = true;
            }).finally(() => {
                this.loading = false;
            });
            axios.get(window.baseUrl + "/api/more", {
                last_id: this.lastId
            })
                .then(response => {
                    this.loadedMovies = response.data;
                }).catch(error => {
                this.errored = true;
            }).finally(() => {
                this.loading = false;
            });
        },
        methods: {
            endpoint(method){
                switch (method) {
                    case 'get':
                        return window.baseUrl + '/api/movies'
                        break;
                }
            },
            changeType(type){
                this.type = type;
            },
            loadMore(){
                axios.get(window.baseUrl + "/api/more", {
                    last_id: this.lastId
                })
                    .then(response => {
                        this.movies = response.data;
                    }).catch(error => {
                    this.errored = true;
                }).finally(() => {
                    this.loading = false;
                });
            }
        },
        computed: {
            randomMovies(){
                return this.movies;
            },
            popularMovies(){
                return this.movies.sort((a, b) => { return b.rating - a.rating;});
            },
            recentMovies(){
                return this.movies.sort((a, b) => new Date(a.first_air_date) - new Date(b.first_air_date))
            },
            lastId(){
                let max = 0;
                this.movies.forEach(movie => {
                    if (movie.id > max) {
                        max = movie.id;
                    }
                });
                return max;
            }
        }
    }
</script>
