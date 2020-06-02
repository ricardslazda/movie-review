<template>
    <nav class="navbar navbar-expand-lg navbar-dark navigation" id="navbar">
            <div class="d-flex w-100">
                <ul class="navbar-nav mr-auto">
                    <a id="bars" class="navigation__brand" href="#">
                        <div class="d-flex align-items-center">
                            <span @click="openSidebar" id="sidebarCollapse" class="px-4 navigation__bars"><img src="images/bars.svg" style="height: 40px"></span>
                        </div>
                    </a>
                </ul>
                <div>
                    <ul class="d-flex align-items-center p-0 m-0">
                        <a class="navigation__list-item" href="#">
                            Home
                        </a>
                        <button class="btn navigation__login">
                            Login or Register
                        </button>
                    </ul>
                </div>
            </div>
    </nav>
</template>

<script>
    export default {
        name: 'Navbar',
        methods: {
            openSidebar(){
                document.querySelector('#navbar').classList.add('navigation--active');
                document.querySelector('#sidebar').classList.remove('active');
                document.querySelector('#content').classList.remove('active');
                document.querySelector('#bars').classList.add('active');
            }
        }
    }
</script>
