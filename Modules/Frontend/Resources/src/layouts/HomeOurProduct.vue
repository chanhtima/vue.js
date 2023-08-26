<template>
    <div class="section-wrapper">
        <div class="section-head">
            <h2 class="section-title">OUR PRODUCTS</h2>
            <div class="separator"></div>
            <p class="see-more">
                <RouterLink to="/product">SEE MORE</RouterLink>
            </p>
        </div>
        <p class="section-description">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet
            dolore magna aliquam erat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
            euismod tincidunt ut laoreet dolore magna aliquam erat
        </p>
    </div>
    <div class="flex flex-wrap -mx-4 -mt-4">
        <div class="w-full xs:w-1/2 md:w-1/3 xl:w-1/4 p-4" v-for="item in cakes" :key="item.id">
            <Card01Tag :img="item.img" :title="item.title" :icon="outIcon" :tag="item.type" :url="item.url"/>
        </div>
    </div>
</template>
<script>
import { RouterLink } from 'vue-router';
import Card01Tag from '../components/card/Card01Tag.vue';
export default {
    components: { Card01Tag, RouterLink },
    setup() {

        const outIcon = './images/out.svg'

        const cakes = [
            {
                'id': '0',
                'img': './images/cake0.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '1',
                'img': './images/cake1.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '2',
                'img': './images/cake2.jpg',
                'title': 'PRODUCTS NAME',
                'type': 'Best Seller',
                'url': 'product-detail'
            },
            {
                'id': '3',
                'img': './images/cake3.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '4',
                'img': './images/cake4.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '5',
                'img': './images/cake5.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '6',
                'img': './images/cake6.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '7',
                'img': './images/cake7.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '8',
                'img': './images/cake8.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '9',
                'img': './images/cake9.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '10',
                'img': './images/cake10.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
            {
                'id': '11',
                'img': './images/cake11.jpg',
                'title': 'PRODUCTS NAME',
                'type': '',
                'url': 'product-detail'
            },
        ]
        return { cakes, outIcon }
    },
}
</script>