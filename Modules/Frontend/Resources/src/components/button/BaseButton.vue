<template>
    <button class="co-base-button" type="button">
        <Router-Link :to="url" class="flex items-center space-x-4">
            <p>
                {{ text }}
            </p>
            <slot name="icon"></slot>
        </Router-Link>
    </button>
</template>
<script>
export default {
    name: 'BaseButton',
    props: ['text', 'url']
}
</script>