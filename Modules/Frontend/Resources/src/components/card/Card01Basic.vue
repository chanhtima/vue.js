<template>
    <div class="co-card-01">
        <div class="co-card-01-img">
            <Router-Link :to="url">
                <img :src=img :alt=title>
            </Router-Link>
        </div>
        <div class="co-card-01-detail">
            <Router-Link :to="url">
                <h2 class="co-card-01-title">{{ title }}</h2>
                <img :src=icon :alt=title>
            </Router-Link>
        </div>
    </div>
</template>
<script>
export default {
    name:'Card01Basic',
    props: ['img', 'title', 'icon' ,'url'],
    setup() {
    }
}
</script>