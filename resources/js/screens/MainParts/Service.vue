<template>
    <div id="service" style="margin-top:30px;background-color:rgba(0,0,0,0.05);padding:5px;" class="container">
        <h4 style="color:#192F60;text-align:center;font-family: 'Bebas Neue', cursive;font-size:30px;">Service</h4>
        <p style="font-family: 'Noto Sans', sans-serif;color:#192F60;text-align:center;font-size:16px;">UBR-TOWING Related Services</p>
        <div style="margin-top:30px;" class="row align-items-center align-self-center justify-content-center">
            <div class="col-4  align-items-center align-self-center mt-3" v-for="service in services" :key="service">
                <ServiceCard :text="service"  />
            </div>
        </div>
    </div>
</template>
<script>
import ServiceCard from '../../Components/ServiceCard'
export default {
    data() {
        return {
            services:['Towing','Winch out','Jump start','Gas Delivery','Lock out','Tires']
        }
    },
    components:{
        ServiceCard
    }
}
</script>