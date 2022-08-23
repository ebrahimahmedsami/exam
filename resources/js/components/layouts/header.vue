<template>
    <div>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <router-link class="navbar-brand" to="/">Exams</router-link>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <template v-if="authenticated === true || authenticated === 'true'">
                                <li class="nav-item" >
                                    <router-link class="nav-link active" to="users">Users</router-link>
                                </li>
                                <li  class="nav-item">
                                    <a class="nav-link active" style="cursor:pointer;" @click="log_out">Log Out</a>
                                </li>
                            </template>
                            <template v-else>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Login / Register
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><router-link class="dropdown-item" to="login">Login</router-link></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><router-link class="dropdown-item" to="register">Register</router-link></li>
                                    </ul>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </nav>
    </div>
</template>

<script>
export default {
    name: "header",
    data(){
        return{
            authenticated : localStorage.getItem('authenticated')
        }
    },
    methods:{
        log_out(){
            localStorage.setItem('authenticated',false)
            localStorage.removeItem('token')
            let thisRef = this
            thisRef.$router.push({ path: 'login' })
        }
    },
    created() {

    }
}
</script>

<style scoped>
nav{
    background: #233243;
}
</style>
