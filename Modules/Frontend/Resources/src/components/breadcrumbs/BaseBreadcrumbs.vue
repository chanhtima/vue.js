<template>
    <ul class="co-base-breadcrumbs">
        <li>
            <Router-Link to="/" >
                <img src="../../assets/images/icon/home.svg" alt="Home" class="co-base-breadcrumbs-icon">
                <span>Home</span>
            </Router-Link>
        </li>
        <li>Page Name (demo)</li>
    </ul>
</template>
<script>
export default {
    name: 'BaseBreadcrumbs'
}
</script>