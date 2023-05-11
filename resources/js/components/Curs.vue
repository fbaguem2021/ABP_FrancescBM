<template>
    <div>
        <p>{{ 'El nombre es '+this.users }}</p>
    </div>
</template>
<script>
export default {
    props: {
        users: {
            type: String,
            required: true
        },
    },
    computed: {
        txt() {
            return this.users
        }
    },
    mounted() {
        console.log("LOG: " + this.users);
    },
    data() {
        return {
             users: "default value"
        }
    },
}
</script>
<style>

</style>
