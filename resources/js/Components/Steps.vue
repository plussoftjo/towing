<template>
    <div class="container">
        <div class="mt-1">
            <h3 style="box-sizing: border-box; font-family: Arial; font-size: 64px; color: rgb(25, 47, 96); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">{{step.step}}</h3>
            <h3 style="box-sizing: border-box; font-family: Arial; font-size: 32px; color: rgb(25, 47, 96); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">{{step.text}}</h3>
            <div class="mt-3"></div>
            
            <div class="row justify-content-center pa-5 ma-5">
                <img src="/images/main_page/steps/2.png" width="300" class="img-fluid" />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['step'],
    created:function() {

    }
}
</script>
