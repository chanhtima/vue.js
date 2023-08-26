<template>
    <div class="card-list-grid">
        <div class="card-list-item" v-for="item in cakes" :key="item.id">
            <Card03Basic :img="item.img" :title="item.title" :url="item.url"></Card03Basic>
        </div>
    </div>
</template>
<style scoped>
.card-list-grid {
  @apply flex flex-wrap -mx-4 pt-2 md:pt-4;
}

.card-list-item {
  @apply w-full xs:w-1/2 lg:w-1/3 2xl:w-1/4 p-2 md:p-4;
}
</style>
<script>
    import Card03Basic from '../components/card/Card03Basic.vue';
    export default {
        name:'ProductListLayout',
        components:{Card03Basic},
        setup(){
            const cakes = [
        {
           'id': '0',
           'img': './images/cake0.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '1',
           'img': './images/cake1.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '2',
           'img': './images/cake2.jpg',
           'title': 'Product Name',
           'type': 'Best Seller',
           'url': 'product-detail'
        },
        {
           'id': '3',
           'img': './images/cake3.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '4',
           'img': './images/cake4.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '5',
           'img': './images/cake5.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '6',
           'img': './images/cake6.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '7',
           'img': './images/cake7.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '8',
           'img': './images/cake8.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '9',
           'img': './images/cake9.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '10',
           'img': './images/cake10.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
        {
           'id': '11',
           'img': './images/cake11.jpg',
           'title': 'Product Name',
           'type': '',
           'url': 'product-detail'
        },
     ]

     return { cakes }
        }
    }
</script>