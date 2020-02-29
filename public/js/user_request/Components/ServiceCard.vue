<template>
    <div style="flex-direction:row;padding:5px;padding-top:10px;margin-top:10px;border:solid 1px black;border-radius:10px;justify-content:center;align-items:center;align-content:center;margin:auto;background-color:rgba(0,0,0,0.05)" class="card card-inverse card-danger">
        <h5 style="text-align:center;">
        <i class="fa fa-bolt" aria-hidden="true"></i>
        </h5>
        <div style="width:5px;" />
        <h3 style="font-family: 'Noto Sans', sans-serif;color:#192F60;text-align:center;font-size:16px;"> {{text}}</h3>
    </div>
</template>
<script>
export default {
    props:['text']
}
</script>