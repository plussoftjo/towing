<template>
    <div class="rel">
        <div class="blue_screen"></div>
        <div class="whte_text">UBR-TOWING is expanding daily in USA</div>
    <GmapMap
            :center="{lat:31.000000, lng:-100.000000}"
            :zoom="7"
            map-type-id="terrain"
            style="width: 100%; height: 550px"
            :options="{
            zoomControl: true,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            rotateControl: false,
            fullscreenControl: true,
            disableDefaultUi: false
            }"
            >
            </GmapMap>
    </div>
</template>
<script>
export default {
  mounted () {
    // At this point, the child GmapMap has been mounted, but
    // its map has not been initialized.
    // Therefore we need to write mapRef.$mapPromise.then(() => ...)

    this.$refs.mapRef.$mapPromise.then((map) => {
      map.panTo({lat: 1.38, lng: 103.80})
    })
  }
}
</script>
<style>
    .rel{position: relative;}
    .blue_screen{position:absolute;top:0px;left:0px;width:100%;height: 550px;background-color: rgba(114,196,255,0.3);z-index: 100;}
    .whte_text{position:absolute; top:0px;left:0px;width:100%;text-align:center;font-size:20px;z-index: 101;color:black;padding-top:40px;}
</style>