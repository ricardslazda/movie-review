@extends('layouts.app')

@section('content')
    <Sidebar></Sidebar>
    <Landing inline-template>
        <div class="content active" id="content">
            <Navbar></Navbar>
            <div class="landing">
                <div class="landing__container">
                    <div class="row m-0 landing__options">
                        <div class="col-lg-4">
                            <h2 class="landing__discover">
                                Discover Movies
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-4" @click="changeType('random')">
                                    <a href="#" class="landing__list-item" :class="this.type === 'random' ? 'landing__list-item--active' : ''">
                                        Random
                                    </a>
                                </div>
                                <div class="col-lg-4" @click="changeType('popular')">
                                    <a href="#" class="landing__list-item" :class="this.type === 'popular' ? 'landing__list-item--active' : ''">
                                        Popular
                                    </a>
                                </div>
                                <div class="col-lg-4" @click="changeType('recent')">
                                    <a href="#" class="landing__list-item" :class="this.type === 'recent' ? 'landing__list-item--active' : ''">
                                        Recent
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-lg-3" v-for="movie in this.recentMovies" :key="movie.id">
                            <Movie :movie="movie" :genre="movie.genre" size="medium"></Movie>
                        </div>
                    </div>
                    <div class="row m-0 d-flex justify-content-center">
                        <button class="btn landing__discover-btn" @click="loadMore()">Discover More</button>
                    </div>
                </div>
            </div>
        </div>
    </Landing>
@endsection
