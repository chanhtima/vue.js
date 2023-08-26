<template>
    <div class="co-card-01 co-card-01-dark">
        <div class="co-card-01-img">
            <Router-Link :to="url">
                <img :src=img :alt=title>
            </Router-Link>
        </div>
        <div class="co-card-01-detail">
            <Router-Link :to="url">
                <div class="co-card-01-date">
                    <img class="co-card-01-date-icon" src="../../assets/images/icon/calendar.svg" alt="">
                    {{ date }}
                </div>
                <h2 class="co-card-01-title">{{ title }}</h2>
                <img :src=icon :alt=title>
            </Router-Link>
        </div>
    </div>
</template>
<script>
export default {
    name:'Card01Date',
    props: ['img', 'title', 'icon' ,'date','url'],
    setup() {
    }
}
</script>