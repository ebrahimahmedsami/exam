<template>
    <section class="vh-100 mb-5" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" v-model="registerData.name" id="form3Example1c" class="form-control" />
                                                <span class="text-danger" v-if="errorMessages.name"> {{ errorMessages.name[0] }}</span>
                                                <br><label class="form-label"  for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" v-model="registerData.email" id="form3Example3c" class="form-control" />
                                                <span class="text-danger" v-if="errorMessages.email"> {{ errorMessages.email[0] }}</span>

                                                <br><label class="form-label"  for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" v-model="registerData.password" id="form3Example4c" class="form-control" />
                                                <span class="text-danger" v-if="errorMessages.password"> {{ errorMessages.password[0] }}</span>
                                                <br><label class="form-label"  for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" v-model="registerData.password_confirmation" id="form3Example4cd" class="form-control" />
                                                <label class="form-label"  for="form3Example4cd">Repeat your password</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2"  v-model="registerData.term" type="checkbox" value="" id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                            <span class="text-danger" v-if="errorMessages.term"> {{ errorMessages.term[0] }}</span>

                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" @click="register" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                         class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "register",
    data(){
        return{
            registerData:{
                name:'',
                email:'',
                password:'',
                password_confirmation:'',
                term:'',
            },
            errorMessages:[]
        }
    },
    methods:{
        register(){
            this.errorMessages = [];
            let thisRef = this
            axios.post('/api/register',this.registerData).then(data => {
                let registerData = data.data;
                console.log(registerData)
                localStorage.setItem('token',registerData.token)
                localStorage.setItem('authenticated','true')
                thisRef.$router.push({ path: '/' });
            }).catch(err => {
                this.errorMessages = err.response.data.errors
            })
        }
    }
}
</script>

<style scoped>

</style>
