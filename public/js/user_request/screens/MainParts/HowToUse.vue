<template>
    <div id="htu" style="margin-top:140px;">
         <h4 style="color:#192F60;text-align:center;font-family: 'Bebas Neue', cursive;font-size:30px;">HOW TO USE</h4>
        <p style="font-family: 'Noto Sans', sans-serif;color:#192F60;text-align:center;font-size:16px;">How to use UBR-TOWING</p>

        <div class="mt-5 pa-5" style="background-color:rgb(231,242,245);">
            <div class="category-label mt50" style="box-sizing: border-box; text-align: center; padding: 30px 0px; margin-top: 50px !important; color: rgb(25, 47, 96); font-family: &quot;Noto Sans Japanese&quot;, &quot;ヒラギノ角ゴ Pro W3&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, メイリオ, Meiryo, Osaka, &quot;ＭＳ Ｐゴシック&quot;, &quot;MS PGothic&quot;, verdana, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">
                <h3 style="box-sizing: border-box; font-family: &quot;Noto Sans Japanese&quot;, &quot;ヒラギノ角ゴ Pro W3&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, メイリオ, Meiryo, Osaka, &quot;ＭＳ Ｐゴシック&quot;, &quot;MS PGothic&quot;, verdana, sans-serif; font-weight: 400; line-height: 32px; color: rgb(25, 47, 96); margin: 0px 0px 15px; font-size: 26px; padding: 50px 0px; text-align: center; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">With a simple operation that
                    <br style="box-sizing: border-box;">you specify from the map, a truck is under your control .
                </h3>
                </div>
                <div class="desc" style="box-sizing: border-box; text-align: left; color: rgb(25, 47, 96); font-family: &quot;Noto Sans Japanese&quot;, &quot;ヒラギノ角ゴ Pro W3&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, メイリオ, Meiryo, Osaka, &quot;ＭＳ Ｐゴシック&quot;, &quot;MS PGothic&quot;, verdana, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">
                <br>
            </div>
                <!-- <transition name="fade" mode="in-out"  v-for="(step,index) in steps" :key="index">
                    <Steps v-show="step.show" :step="step"/>
                </transition> -->
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div v-for="(step,index) in steps" :key="index" class="carousel-item" :class="{active:index==0?true:false}">
                             <Steps :step="step"/>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>

        </div>
    </div>
</template>
<script>
import Steps from '../../Components/Steps'
export default {
    components:{Steps},
    data() {
        return {
            steps:[
                {img:'',step:'01',text:'Decide where to get on',show:true},
                {img:'',step:'02',text:'Select service & complete details',show:false},
                {img:'',step:'03',text:'Find a truck',show:false},
                {img:'',step:'04',text:'Service completed',show:false},

            ],
            inx:0
        }
    },
    creaxted:function () {
        let vm = this;
        let timer = setInterval(() => {
            vm.steps.forEach((trg,index) => {
                trg.show = false;
            });
            vm.steps[vm.inx].show = true;
            if(vm.inx == vm.steps.length -1) {
                vm.inx = 0;
            }else {
                vm.inx = vm.inx + 1;
            }
        }, 1000);
    }
}
</script>
<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.carousel-fade .carousel-item {
 opacity: 0;
 transition-duration: .6s;
 transition-property: opacity;
}

.carousel-fade  .carousel-item.active,
.carousel-fade  .carousel-item-next.carousel-item-left,
.carousel-fade  .carousel-item-prev.carousel-item-right {
  opacity: 1;
}

.carousel-fade .active.carousel-item-left,
.carousel-fade  .active.carousel-item-right {
 opacity: 0;
}

.carousel-fade  .carousel-item-next,
.carousel-fade .carousel-item-prev,
.carousel-fade .carousel-item.active,
.carousel-fade .active.carousel-item-left,
.carousel-fade  .active.carousel-item-prev {
 transform: translateX(0);
 transform: translate3d(0, 0, 0);
}




</style>