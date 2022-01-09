<template>

</template>
<script>
export default {
    data(){
        return{
            mobile: false
        }
    },
    mounted(){
        this.handlemobile()
    },
    methods:{
        handlemobile(){
            return window.innerWidth > 992 ? this.mobile = true : this.mobile = false
        }
    },

};
</script>
<style scoped>


</style>
