<template>
    <div class="section-wrapper">
        <div class="section-head">
            <h2 class="section-title">News & Events</h2>
            <div class="separator"></div>
            <p class="see-more">
                <RouterLink to="/news-event">SEE MORE</RouterLink>
            </p>
        </div>
    </div>
    <div class="flex flex-wrap -mx-4 -mt-6">
        <div class="w-full xs:w-1/2 xl:w-1/4 p-4" v-for="item in newsEvents" :key="item.id" >
            <Card01Date :img="item.img" :title="item.title" :icon="outIcon" :url="item.url" :date="item.date"/>
        </div>
    </div>
</template>
<script>
    import Card01Date from '../components/card/Card01Date.vue';
    export default{
        components:{Card01Date},
        setup(){

            const outIcon = './images/out.svg'

            const newsEvents = [
                {
                    'id':'1',
                    'img':'./images/news1.jpg',
                    'title':'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                    'date':'20-Jun-2023',
                    'url':'/news-event-detail'
                },
                {
                    'id':'2',
                    'img':'./images/news2.jpg',
                    'title':'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                    'date':'20-Jun-2023',
                    'url':'/news-event-detail'
                },
                {
                    'id':'3',
                    'img':'./images/news3.jpg',
                    'title':'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                    'date':'20-Jun-2023',
                    'url':'/news-event-detail'
                },
                {
                    'id':'4',
                    'img':'./images/news4.jpg',
                    'title':'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
                    'date':'20-Jun-2023',
                    'url':'/news-event-detail'
                },
            ]
            return {newsEvents,outIcon}
        },
    }
</script>