<template>
    <section class="section section-lg section-shaped overflow-hidden my-0" style="padding-bottom: 0px !important; background: #0084ff">
        <div class="container shape-container pt-0 pb-3">
            <div class="row row-grid justify-content-between align-items-center mb-5">
                <div v-if="mobile==false" class="col-lg-6 initial-template">

                    <h3 class="display-3 text-white">Inglês sem enrolação
                        <span class="text-white">e sem sair de casa</span>
                    </h3>
                    <p class="lead text-white text-justify">
                        Faça o seu cadastro gratuitamente e descubra como aprender inglês pode ser fácil e divertido.
                        Aqui você escolhe o seu professor, pode rever as aulas quando quiser e praticar seus conhecimentos com atividades personalizadas.

                    </p>
                    <div v-if="mobile==false" id="botao" class="btn-wrapper" >
                        <a href="#cadastro" class="btn btn-success text-white">
                            Cadastre-se gratuitamente!
                        </a>
                    </div>
                </div>
                <div v-else class="col-lg-6 initial-template" style="height: 100%;">
                    <img src="/img/pessoa.png" alt="" style="max-width: 85%; position: absolute; bottom: -350px; left: -110px;">
                    <h3 class="display-3 text-white text-center" style="position: absolute; top: -170px; right: -90px;">
                         Aprenda Inglês<br><span style="font-size: 4rem; font-family: Stencil Std, fantasy; color:#fffc00">sem enrolação</span>
                         <span class="text-white">e sem sair de casa</span>
                    </h3>
                    <!--<p class="lead text-white text-justify">
                        Faça o seu cadastro gratuitamente e descubra como aprender inglês pode ser fácil e divertido.
                        Aqui você escolhe o seu professor, pode rever as aulas quando quiser e praticar seus conhecimentos com atividades personalizadas.

                    </p>
                    <div v-if="mobile==false" id="botao" class="btn-wrapper" >
                        <a href="#cadastro" class="btn btn-success text-white">
                            Cadastre-se gratuitamente!
                        </a>
                    </div> -->
                </div>
                <div class="col-lg-5 mb-5 mb-lg-auto" id="cadastro">
                    <transition>
                        <div class="transform-perspective-right">
                            <card class="border-0" type="secondary" shadow
                                body-classes="px-lg-5 py-lg-5"
                                header-classes="bg-white">
                                <template slot="header">
                                    <div class="text-muted text-center mb-3">
                                        <small>Cadastre-se gratuitamente com</small>
                                    </div>
                                    <div class="btn-wrapper text-center">
                                        <base-button type="neutral">
                                            <img slot="icon" src="img/icons/common/github.svg">
                                            Facebook
                                        </base-button>

                                        <base-button type="neutral social-button">
                                            <img slot="icon" src="img/icons/common/google.svg">
                                            Google
                                        </base-button>
                                    </div>
                                </template>
                                <template>
                                    <div class="text-center text-muted mb-4">
                                        <small>Ou cadastre-se com seu email</small>
                                    </div>
                                    <form role="form">
                                        <base-input alternative
                                                    placeholder="Email"
                                                    addon-left-icon="ni ni-email-83">
                                        </base-input>
                                        <base-input alternative
                                                    type="password"
                                                    placeholder="Senha"
                                                    addon-left-icon="ni ni-lock-circle-open">
                                        </base-input>
                                        <base-input alternative
                                                    type="password"
                                                    placeholder="Confirme sua senha"
                                                    addon-left-icon="ni ni-lock-circle-open">
                                        </base-input>
                                        <base-checkbox>
                                            Remember me
                                        </base-checkbox>
                                        <div class="text-center">
                                            <base-button type="primary" style="background: #0084ff; border: none;" class="my-4">Cadastre-se Gratuitamente</base-button>
                                        </div>
                                    </form>
                                </template>
                            </card>
                        </div>
                    </transition>
                </div>
            </div>
            <div class="custom-shape-divider-bottom-1616051582">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>
    </section>
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
        },
        beforeEnter(el){

        },
        enter(el, done){

            done()
        },
        afterEnter(el){

        },
        beforeEnter(el){

        },
        beforeEnter(el){

        },
        beforeEnter(el){

        },
        beforeEnter(el){

        },
    },

};
</script>
<style scoped>
@media screen and (max-width: 992px) {
    #botao{
        display: flex !important;
        justify-content: center !important;
    }
}
@media screen and (max-width: 389px) {
    .social-button{
        margin-top: 1rem;
    }
}
@media screen and (max-width: 576px) {
    .initial-template{
        margin-top: 10vh;
        height: 65vh;
    }
}
.custom-shape-divider-bottom-1616051582 {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.custom-shape-divider-bottom-1616051582 svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 150px;
}

.custom-shape-divider-bottom-1616051582 .shape-fill {
    fill: #FFFFFF;
}

.section{
    padding-top: 150px;
}
</style>
