<template>
    <header class="header-global fixed-top" v-scroll="handleScroll">
        <base-nav class="navbar-main" :class="{'aplicarbg': aplicarbg, 'aplicarborda': aplicarbg}" transparent type="" effect="light" expand>
            <a :class="{'cor-vermelha':aplicarbg}" href="#" slot="brand" class="navbar-brand mr-lg-5">
                <div class="div-logo">
                    <img :class="{'d-none':aplicarbg}" style="height: 7vh" src="/img/white.png" alt="">
                    <img :class="{'d-none':barrasticky}" style="height: 7vh" src="/img/logo_blue.png" alt="">
                </div>
            </a>
            <div class="row" slot="content-header" slot-scope="{closeMenu}">
                <div class="col-6 collapse-brand">
                    <a href="#" style="font-size: 2rem;">

                    </a>
                </div>
                <div class="col-6 collapse-close">
                    <close-button @click="closeMenu" :class="{'aplicarbg': aplicarbg}"></close-button>
                </div>
            </div>


            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <a :href="alunos" class="nav-link">
                        <span class="nav-link-inner--text" :class="{'aplicarbg': aplicarbg}">
                            Acesso alunos
                        </span>
                    </a>
                    <div class="vl"></div>
                    <a :href="cadastrar" class="nav-link">
                        <span class="nav-link-inner--text">
                            <a  :class="{'botao-nav-padrao':barrasticky, 'botao-nav-scrolled':aplicarbg}"
                                class="btn btn-warning btn-md botao-nav-padrao"
                                style=" border: none; border-radius: 20px;">
                                Cadastre-se
                            </a>
                        </span>
                    </a>
            </ul>
        </base-nav>
    </header>
</template>
<script>


export default {
    props:[
        'welcome',
        'alunos',
        'cadastrar'
    ],
    data(){
        return{
            aplicarbg: false,
            barrasticky: true,
        }
    },
    methods:{
        handleScroll(){
            window.scrollY > 80 ? this.aplicarbg=true : this.aplicarbg=false
            window.scrollY > 80 ? this.barrasticky=false : this.barrasticky=true
        }
    },
    components: {

    }
};
</script>
<style scoped>

@media screen and (max-width: 992px) {
    .vl{
        display: none;
    }
}

.botao-nav-padrao{
    background:#fffc00 !important;
    color:#212529 !important;
}
.botao-nav-scrolled{
    background: rgb(0, 132, 255) !important;
    color: white !important;
}
.nav-link-inner--text{
    font-size: 1.2rem;
}
.navbar-main{
    background: transparent;
}
.aplicarbg{
    background: white;
    color: #212529 !important;
}
.aplicarbg:hover{
    background: white;
    color: #dc3545 !important;
}

.aplicarborda{
    box-shadow: 0px 1px 7px #646464;
}
.cor-vermelha{
    color: #0084ff !important;
}

.bg-botao-navbar{
    color: white;
    background-color: #dc3545 !important;
}

*{
    font-family: "Merriweather Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-weight: 700;
    font-size: 0.9rem;
}
.vl {
  border-left: 2px solid gray;
  height: 1rem;
  margin-top: 0.3rem;
}

</style>
