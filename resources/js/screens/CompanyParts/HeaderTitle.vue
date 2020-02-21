<template>
    <div class="header-title">
        <h2 class="headlineLv2" style="box-sizing: border-box; margin: 0px; padding: 0px 0px 15px; font-weight: normal; border-bottom: 1px solid rgb(224, 226, 233); color: rgb(25, 47, 96);font-family: 'Noto Sans', sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(253, 253, 255); text-decoration-style: initial; text-decoration-color: initial;"><span class="is-main" style="box-sizing: border-box; display: block; font-size: 3rem; margin-bottom: 5px; letter-spacing: -0.02em;">{{title}}</span><span class="is-sub" style="box-sizing: border-box; display: block; font-size: 1rem; font-weight: bold;">{{text}}</span></h2>
    </div>
</template>
<script>
export default {
    props:['title','text']
}
</script>
<style>
    .header-title{padding: 30px;}
</style>