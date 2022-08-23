<template>
    <div>
        Users List
    </div>
</template>

<script>
export default {
    name: "users-list",
    created() {
        this.getUsers()
    },
    methods:{
        getUsers(){
            axios.get('/api/users').then(users=>{
                console.log(users)
            })
        }
    }
}
</script>

<style scoped>

</style>
