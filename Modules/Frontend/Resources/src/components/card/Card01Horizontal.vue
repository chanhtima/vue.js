<template>
    <div class="co-card-01-hoz">
        <div class="co-card-01-hoz-img">
            <div class="co-card-01-hoz-img-wrapper">
                <img :src=img :alt=title>
            </div>
        </div>
        <div class="co-card-01-hoz-detail">
            <p class="co-card-01-hoz-date">
                <img src="../../assets/images/icon/calendar.svg" :alt=date>
                <span>{{ date }}</span>
            </p>
            <h2 class="co-card-01-hoz-title">{{ title }}</h2>
            <p class="co-card-01-hoz-subtitle">{{ detail }}</p>
            <slot name="action"></slot>
        </div>
    </div>
</template>
<script>
export default {
    name:'Card01Horizontal',
    props: ['img', 'title', 'date' , 'detail' ,'url'],
    setup() {
    }
}
</script>