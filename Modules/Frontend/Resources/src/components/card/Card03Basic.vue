<template>
    <div class="co-card-03">
        <div class="co-card-03-img">
            <Router-Link :to="url">
                <img :src=img :alt=title>
            </Router-Link>
        </div>
        <div class="co-card-03-detail">
            <Router-Link :to="url">
                <h2 class="co-card-03-title">{{ title }}</h2>
            </Router-Link>
        </div>
    </div>
</template>
<script>
export default {
    name:'Card03Basic',
    props: ['img', 'title','url'],
    setup() {
    }
}
</script>