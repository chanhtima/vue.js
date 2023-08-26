<template>
    <div class="co-card-02">
        <div class="co-card-02-img">
            <Router-Link :to="url">
                <img :src=img :alt=title>
            </Router-Link>
        </div>
        <div class="co-card-02-detail">
            <Router-Link :to="url">
                <h2 class="co-card-02-title">{{ title }}</h2>
                <p class="co-card-02-subtitle">{{ description }}</p>
                <p class="co-card-02-action">View More</p>
            </Router-Link>
        </div>
    </div>
</template>
<script>
export default {
    name:'Card02Basic',
    props: ['img', 'title', 'description' ,'url'],
    setup() {
    }
}
</script>