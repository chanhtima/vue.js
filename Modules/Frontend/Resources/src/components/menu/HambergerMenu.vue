<template>
    <details class="co-hamberger-menu dropdown dropdown-end" id="hambergerDropdown">
        <summary tabindex="0" class="co-hamberger-menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#fff" viewBox="0 0 24 24" stroke="#fff">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
        </summary>
        <ul tabindex="0" class="co-hamberger-menu-list menu menu-md dropdown-content">
            <li v-for="item in routerLink" :key="item.id"><RouterLink :to=item.url>{{ item.name }}</RouterLink></li>
        </ul>
    </details>
</template>
<script>
import debounce from 'lodash/debounce';
export default {
    name: 'HambergerMenu',
    props: {routerLink:Object},
    methods: {
        closeHamberger(e) {
            let get = document.getElementById('hambergerDropdown')
            if (!get.contains(e.target)) {
                get.removeAttribute('open')
            }
        },
        hideHamberger(){
            let get = document.getElementById('hambergerDropdown');
            if (window.innerWidth >= 992) {
                get.removeAttribute('open')
            }
        }
    },
    mounted() {
        window.addEventListener('mouseup', this.closeHamberger);
        window.addEventListener('resize', debounce(this.hideHamberger, 1000));
    },
    unmounted(){
        window.removeEventListener('mouseup', this.closeHamberger);
    }
}
</script>