<template>
    <div class="div-logo">
        <img :class="{'d-none':aplicarbg}" style="height: 7vh" src="/img/logo_black.png" alt="">
        <img :class="{'d-none':barrasticky}" style="height: 7vh" src="/img/logo_blue.png" alt="">
    </div>
</template>

<script>
    export default {
        name: 'Logo',
        props:['principal'],
        data(){
            return{
                aplicarbg: false,
                barrasticky: true
            }
        },
        methods:{
            handleScroll(){
                window.scrollY > 80 ? alert('ae') : this.aplicarbg='logo_black'
                window.scrollY > 80 ? this.barrasticky=false : this.barrasticky=true

            }
        }
    }
</script>

<style>

</style>
