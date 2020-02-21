<template>
    <div class="home">
        <Header/>
        <HeaderImage/>
        <HeaderTitle title="What Mission" text="UBR-TOWING wants to achieve" />
        <div class="pa-5 container">
            <h2 class="headlineLv2 pa-5" style="box-sizing: border-box; margin: 0px; padding: 0px 0px 15px; font-weight: normal; border-bottom: 1px solid rgb(224, 226, 233); color: rgb(25, 47, 96); font-family: &quot;ヒラギノ角ゴ ProN W3&quot;, &quot;Hiragino Kaku Gothic ProN&quot;, メイリオ, Meiryo, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(253, 253, 255); text-decoration-style: initial; text-decoration-color: initial;">To provide
                <br style="box-sizing: border-box; color: rgb(253, 253, 255); font-family: &quot;ヒラギノ角ゴ ProN W3&quot;, &quot;Hiragino Kaku Gothic ProN&quot;, メイリオ, Meiryo, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 700; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(25, 47, 96); text-decoration-style: initial; text-decoration-color: initial;">opportunities equally to all people&nbsp;through the provision of mobility services&nbsp;.
                <br style="box-sizing: border-box; color: rgb(253, 253, 255); font-family: &quot;ヒラギノ角ゴ ProN W3&quot;, &quot;Hiragino Kaku Gothic ProN&quot;, メイリオ, Meiryo, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 700; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(25, 47, 96); text-decoration-style: initial; text-decoration-color: initial;">In addition, the travel time itself
                <br style="box-sizing: border-box; color: rgb(253, 253, 255); font-family: &quot;ヒラギノ角ゴ ProN W3&quot;, &quot;Hiragino Kaku Gothic ProN&quot;, メイリオ, Meiryo, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 700; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(25, 47, 96); text-decoration-style: initial; text-decoration-color: initial;">should be changed to “opportunities”&nbsp;instead of&nbsp;“&nbsp;costs”&nbsp;.&nbsp;Whether
                <br style="box-sizing: border-box; color: rgb(253, 253, 255); font-family: &quot;ヒラギノ角ゴ ProN W3&quot;, &quot;Hiragino Kaku Gothic ProN&quot;, メイリオ, Meiryo, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 700; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(25, 47, 96); text-decoration-style: initial; text-decoration-color: initial;">traveling now or in the future, we offer a joyful experience, and
                <br style="box-sizing: border-box; color: rgb(253, 253, 255); font-family: &quot;ヒラギノ角ゴ ProN W3&quot;, &quot;Hiragino Kaku Gothic ProN&quot;, メイリオ, Meiryo, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 700; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(25, 47, 96); text-decoration-style: initial; text-decoration-color: initial;">we aim to make people happy.
            </h2>
        </div>
        <HeaderTitle title="Vision" text="for realizing the Vision mission" />
        <HeaderTitle title="Value" text="Code of Conduct" />

        <FotterView/>
    </div>
</template>
<script>
import Header from '../Components/Header'
import HeaderImage from './CompanyParts/HeaderImage'
import HeaderTitle from './CompanyParts/HeaderTitle'
import FotterView from './MainParts/FotterView'
export default {
    components:{Header,
        HeaderImage,
        HeaderTitle,
        FotterView
    }
}
</script>