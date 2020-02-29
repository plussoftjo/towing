<template>
    <div>
       <Header/>
       <Headersliders/>
       <Service/>
       <About/>
       <HowToUse/>
       <Maps/>
       <Feature/>
       <Downloads/>
       <FotterView/>
    </div>
</template>
<script>
import Header from '../Components/Header'
import Headersliders from './MainParts/Headersliders'
import Service from './MainParts/Service'
import About from './MainParts/About'
import HowToUse from './MainParts/HowToUse'
import FotterView from './MainParts/FotterView'
import Maps from './MainParts/Maps'
import Feature from './MainParts/Feature';
import Downloads from './MainParts/Downloads'
export default {
    components:{
        Header,
        Headersliders,
        Service,
        About,
        HowToUse,
        FotterView,
        Maps,
        Feature,
        Downloads
    }
}
</script>
<style>

</style>