<template>
    <div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/main_page/sliders/slide1.jpg" class="d-block w-100" style="height:600px;" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/images/main_page/sliders/slide2.jpg" class="d-block w-100" style="height:600px" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/images/main_page/sliders/slide3.png" class="d-block w-100" style="height:600px" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <div style="position:absolute;left:40px;bottom:30px;">
                <div style="flex-direction:row;z-index:100;">
                    <img src="/images/main_page/sliders/apple.png" style="height:50px;width:125px;cursor:pointer;" />
                    <img src="/images/main_page/sliders/google.png" style="height:50px;width:125px;cursor:pointer;" />
                </div>
            </div>
        </div>
    </div>
</template>