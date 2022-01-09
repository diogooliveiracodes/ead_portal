<template>
    <footer data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
        class="" style="position: relative; overflow: hidden; background: #0084ff;">
        <div class="custom-shape-divider-top-1616042631">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="container container-md">
            <div class="row mx-0">
                <div class="col-md-12 col-12 mb-5 mb-md-0">
                    <a href="/cadastre-se">
                        <div class="card shadow border-0 align-items-center py-5 px-0" style="background:#fffc00; border-radius: 100px;">
                            <div class="row justify-content-center mx-0" style="width: 100%;">
                                <div class="col-md-12">
                                    <p class="text-muted text-center text-right px-2 text-footer">
                                        <span class="span-footer" style="font-family: Stencil Std, fantasy; color:#0084ff">Inscreva-se gratuitamente!</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-between my-sm">
                <div class="col-lg-6">
                    <a href="#">
                        <div class="div-logo">
                            <img style="height: 5vh" src="/img/white.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 text-lg-center btn-wrapper">
                    <div class="row mx-0 px-0 justify-content-between">
                        <a class="footer-social-icon color-component-primary bg-component-light" href="">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="footer-social-icon color-component-primary bg-component-light" href="">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a class="footer-social-icon color-component-primary bg-component-light" href="">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr style="border-color: white;">
            <div class="row align-items-center justify-content-center pb-sm">
                <div class="col-md-12 text-center">
                    <div class="copyright" style="color: white !important;">
                        &copy; {{year}}
                        <a class="text-white" target="_blank" rel="noopener">Perola</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
  name: 'app-footer',

  data() {
    return {
      year: new Date().getFullYear()
    }
  }
};
</script>

<style scoped>

.custom-shape-divider-top-1616042631 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.custom-shape-divider-top-1616042631 svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 104px;
}

.custom-shape-divider-top-1616042631 .shape-fill {
    fill: #FFFFFF;
}

.footer-social-icon {
    border-radius: 100%;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 21px;
}

.color-component-primary {
    color: #0084ff;
}

.bg-component-light {
    background-color: #c1edff;
}

.text-footer{
    transition: all 0.5s;
}

.text-footer:hover{
    transform: scale3d(1.1, 1.1, 1.1);
    transition: all 0.5s;
}

i:hover{
    transform: scale3d(1.2, 1.2, 1.2);
    transition: all 0.5s;
}

@media screen and (max-width: 556px) {
    .span-footer{
        font-size: 1.6rem;
    }
}
@media screen and (min-width: 557px) and (max-width: 992px) {
    .span-footer{
        font-size: 2rem;
    }
}
@media screen and (min-width: 993px) {
    .span-footer{
        font-size: 4rem;
    }
}
</style>
