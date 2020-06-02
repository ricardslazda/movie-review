<template>
    <header>
        <div class="sidebar active" id="sidebar">
                <div class="sidebar__title-container py-3 pl-5">
                    <div id="half">
                        <p class="navbar-brand sidebar__title" href="#">Menu</p>
                        <a href="#" id="close" class="sidebar__close" @click="close">X</a>
                    </div>
                </div>
            <div class="sidebar__container px-5">
                <h2 class="sidebar__sub-title mt-5 mb-3">Categories</h2>
                <ul class="nav flex-column mb-0">
                    <li class="nav-item sidebar__item-container">
                        <a href="#" class="nav-link sidebar__item px-0 py-3">
                            New Releases
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link sidebar__item px-0 py-3">
                            Coming Soon
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link sidebar__item px-0 py-3">
                            Popular Serials
                        </a>
                    </li>
                </ul>
                <h2 class="sidebar__sub-title mt-5 mb-3">Your library</h2>
                <ul class="nav flex-column mb-0">
                    <li class="nav-item sidebar__item-container">
                        <a href="#" class="nav-link sidebar__item px-0 py-3">
                            Favorites
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link sidebar__item px-0 py-3">
                            Watchlist
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar__logo-container">
                <img src="images/logo.png" alt="Logo image" class="sidebar__logo">
            </div>
            </div>
    </header>
</template>

<script>
    export default {
        name: "Sidebar",
        methods: {
            close(){
                document.querySelector('#navbar').classList.remove('navigation--active');
                document.querySelector('#sidebar').classList.add('active');
                document.querySelector('#content').classList.add('active');
                document.querySelector('#bars').classList.remove('active');
            }
        }
    }
</script>
