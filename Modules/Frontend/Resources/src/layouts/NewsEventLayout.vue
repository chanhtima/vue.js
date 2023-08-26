<template>
    <div class="card-list-grid">
        <div class="card-list-item" v-for="item in newsEvents" :key="item.id">
            <Card01Date :img="item.img" :title="item.title" :icon="outIcon" :url="item.url" :date="item.date"/>
        </div>
    </div>
</template>
<style scoped>
    .card-list-grid{
        @apply flex flex-wrap -mx-4 pt-2 md:pt-4;
    }
    .card-list-item{
        @apply w-full xs:w-1/2 lg:w-1/3 2xl:w-1/4 p-2 md:p-4;
    }
</style>
<script>
import Card01Date from '../components/card/Card01Date.vue';
export default {
    name: 'NewsEventLayout',
    components: { Card01Date },
    setup() {

        const outIcon = './images/out.svg'

        const newsEvents = [
            {
                'id': '1',
                'img': './images/news1.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '2',
                'img': './images/news2.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '3',
                'img': './images/news3.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '4',
                'img': './images/news4.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '5',
                'img': './images/news5.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '6',
                'img': './images/news6.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '7',
                'img': './images/news7.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '8',
                'img': './images/news8.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '9',
                'img': './images/news9.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '10',
                'img': './images/news10.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '11',
                'img': './images/news4.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
            {
                'id': '12',
                'img': './images/news3.jpg',
                'title': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                'date': '20-Jun-2023',
                'url': '/news-event-detail'
            },
        ]
        return { newsEvents, outIcon }
    },
}
</script>