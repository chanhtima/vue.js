<template>
    <div class="co-form co-form-wrapper">
        <label :for=name class="co-form-label">{{ label }}</label>
        <input :id=name class="co-form-style" :type="type" :placeholder=placeholder>
    </div>
</template>
<script>
export default {
    name:'FormInput',
    props:['name','label','placeholder','type','value'],
}
</script>