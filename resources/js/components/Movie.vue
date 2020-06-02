<template>
    <div v-if="componentSize === 'small'">
        <div>
            <div>
                <img :src="posterPath" class="movie-small__image">
            </div>
            <div>
                <div class="my-3">
                    <h2 class="m-0 p-0 movie-small__info-name">
                        {{movieName}}
                    </h2>
                    <span class="movie-small__info-genre">
                        {{genreName}}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="componentSize==='medium'">
        <div>
            <div class="movie-medium__container">
                <img :src="posterPath" class="movie-medium__image">
                    <div class="movie-medium__info-container">
                        <h2 class="movie-medium__info-name">
                            {{movieName}}
                        </h2>
                        <span class="movie-medium__info-genre">
                            {{genreName}}
                            </span>
                    </div>
                    <div class="movie-medium__rating-container">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="far fa-star movie-medium__rating"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="m-0 pl-2">{{rating}}</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div v-else-if="componentSize==='big'">
        <div>
            <div class="movie-big__image-container">
                <img :src="posterPath" class="movie-big__image">
                    <div class="movie-big__info-container">
                        <h2 class="pt-3 movie-big__info-title">
                            {{movieName}}
                        </h2>
                    </div>
                    <div class="movie-big__release-container">
                        <h3 class="movie-big__release">
                            Release Date
                        </h3>
                        <span>22.04.2015</span>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Movie",
        props: ['movie', 'genre', 'size'],
        data() {
            return {
                movieName: this.movie.name,
                genreName: this.genre.body,
                rating: this.movie.rating,
                componentSize: this.size
            }
        },
        computed: {
            posterPath() {
                return window.baseUrl + '/images/posters' + this.movie.poster_path;
            }
        }
    }
</script>
