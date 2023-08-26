

<template>
    <FullSlide :defaultOption="splideOption">
        <template #slideItem>
            <SplideSlide v-for="item in images" :key="item.id">
                <SlideItem>
                    <template #content>
                        <img :src=item.urls.regular :alt=item.alt_description>
                    </template>
                </SlideItem>
            </SplideSlide>
        </template>
    </FullSlide>
</template>
<script>
import { SplideSlide } from '@splidejs/vue-splide';
import FullSlide from '../components/carousel/FullSlide.vue';
import SlideItem from '../components/carousel/SlideItem.vue';
export default {
    name:'BannerSlide',
    components: {
        SplideSlide,
        FullSlide,
        SlideItem,
    },
    data()
    {
        const splideOption = {
            perPage: 1,
            autoplay: true,
            interval: 5000,
            rewind:true,
            type: "slide",
            pagination: false,
            arrows: true,
        };
        return{
            images: [],
            splideOption
        }
    },
    async mounted()
    {
        fetch('https://api.unsplash.com/photos/?client_id=zDeAYvbLmL6zXNomK9wJ1v2tzSJ2jz4WnTlxCV2olz4')
        .then(response => response.json())
        .then(data => this.images = data);
    }
};
</script>
<style scoped>
img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.slide-item {
    aspect-ratio: 21/7;
}
</style>