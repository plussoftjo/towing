<template>
    <div id="feature" class="feature" style="margin-top:100px;">
        <h4 style="color:#192F60;text-align:center;font-family: 'Bebas Neue', cursive;font-size:30px;">FEATURES</h4>
        <p style="font-family: 'Noto Sans', sans-serif;color:#192F60;text-align:center;font-size:16px;">Other useful functions</p>
        <div class="mt-5 pt-5 container">
            <div class="row justify-content-center">
                <div class="col-sm-3" v-for="(feature,index) in features" :key="index">
                <div class="card card-inverse bg-blue  text-center pt-2" style="background-color:rgba(60,66,70,0.8);">
                    <div class="card-block card-title">
                        <h1 class="mb-2"><i class="align-middle text-light md_18 material-icons display-2 " :class="[feature.icon]"></i></h1>
                        <h6 class="text-light">{{feature.title}}</h6>
                        <div class="pb-4"></div>
                    </div>
                </div>
                <div class="text-center pt-3" style="color:#192F60;text-align:center;font-family:'Noto Sans', sans-serif;font-size:14px;">
                    {{feature.text}}
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            features:[
                {icon:'fa fa-usd',title:'online payment',text:"If you use UBR-TOWING online payment function, you will not need to pay when you get off by registering the payment information in advance."},
                {icon:'fa fa-search',title:'Fare search',text:"If you use UBR-TOWING, you can use app and select service and see the fare of the service before find truck."},
                {icon:'fa fa-info-circle',title:'Multy service',text:"With UBR-TOWING you have multy service to use and spefect from the app to get help any where in your location,with truck under your control."},
            ]
        }
    }
}
</script>