<template>
    <ul class="co-horizontal-menu">
        <li v-for="item in routerLink" :key="item.id"><RouterLink :to=item.url>{{ item.name }}</RouterLink></li>
    </ul>
</template>
<script>
export default{
        name:'HorizontalMenu',
        props: {routerLink:Object}
    }
</script>