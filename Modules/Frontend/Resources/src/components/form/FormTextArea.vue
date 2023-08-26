<template>
    <div class="co-form co-form-wrapper">
        <label :for=name class="co-form-label">{{ label }}</label>
        <textarea :id=name class="co-form-style" rows="5" :placeholder=placeholder></textarea>
    </div>
</template>
<script>
export default {
    name:'FormTextArea',
    props:['name','label','placeholder','value'],
}
</script>