<template>
    <Splide :options="defaultOption">
        <slot name="slideItem">

        </slot>
    </Splide>
</template>

<script>
import { Splide } from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';
import '@splidejs/vue-splide/css/core';
export default {
    components: {
        Splide,
    },
    props: [
        'defaultOption'
    ],
};
</script>