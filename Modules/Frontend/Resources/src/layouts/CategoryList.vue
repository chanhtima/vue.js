<template>
    <ul class="category-list">
        <li>
            <RouterLink to="/product">Category Name of A</RouterLink>
        </li>
        <li>
            <RouterLink to="/product">Category Name of  B</RouterLink>
        </li>
        <li>
            <RouterLink to="/product">Category Name of  C</RouterLink>
        </li>
    </ul>
</template>
<script>
import { RouterLink } from 'vue-router';
export default {
    components: { RouterLink }
}
</script>
<style scoped>
    .category-list li{
        @apply font-medium mb-2
    }
</style>