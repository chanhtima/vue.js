<template>
    <div class="bg-[#3D3A36] py-3 navbar-main">
        <div class="container">
            <div class="navbar nav-bar-social-wrapper">
                <div class="navbar-start">
                </div>
                <div class="navbar-end">
                    <ul class="nav-bar-social">
                        <li v-for="item in iconData" :key="item.id">
                            <Router-Link :to="item.url">
                                <img :src="'./images/icon/' + item.icon + '.svg'" :alt=item.icon>
                            </Router-Link>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navbar bg-[#3D3A36]">
                <div class="navbar-start">
                    <div class="logo">
                        <Router-Link to="/">
                            <Logo></Logo>
                        </Router-Link>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="hidden lg:flex">
                        <HorizontalMenu :routerLink="menu"/>
                    </div>
                    <BaseLanguageSwitch class="ml-4"/>
                    <HambergerMenu :routerLink="menu"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Logo from '../assets/images/LogoRegular.vue'
import HambergerMenu from '../components/menu/HambergerMenu.vue'
import HorizontalMenu from '../components/menu/HorizontalMenu.vue'
import BaseLanguageSwitch from '../components/language/BaseLanguageSwitch.vue'
import debounce from 'lodash/debounce';
export default {
    name: 'PageHeader',
    components: { Logo, HambergerMenu, HorizontalMenu, BaseLanguageSwitch },
    setup() {
        const iconData = [
            {
                'id': '1',
                'url': '#',
                'icon': 'envelope'
            },
            {
                'id': '2',
                'url': '#',
                'icon': 'facebook'
            },
            {
                'id': '3',
                'url': '#',
                'icon': 'instagram'
            },
            {
                'id': '4',
                'url': '#',
                'icon': 'linkedin'
            },
            {
                'id': '5',
                'url': '#',
                'icon': 'phone'
            },
            {
                'id': '6',
                'url': '#',
                'icon': 'skype'
            },
            {
                'id': '7',
                'url': '#',
                'icon': 'twitter'
            },
        ]
        const menu = [
            {
                'id': '0',
                'name': 'Home',
                'url': '/',
            },
            {
                'id': '1',
                'name': 'About Us',
                'url': 'about',
            },
            {
                'id': '2',
                'name': 'News & Events',
                'url': 'news-event',
            },
            {
                'id': '3',
                'name': 'Products',
                'url': 'product',
            },
            {
                'id': '4',
                'name': 'Contact Us',
                'url': 'contact',
            },
        ]
        return { iconData, menu }
    },
    methods: {
        handleScroll() {
            if(window.scrollY > 302){
                document.querySelector('.nav-bar-social-wrapper').classList.add('active')
                document.querySelector('.logo').classList.add('active')
            }
            else{
                document.querySelector('.nav-bar-social-wrapper').classList.remove('active')
                document.querySelector('.logo').classList.remove('active')
            }
        }
    },
    mounted () {
        this.handleDebouncedScroll = debounce(this.handleScroll, 50);
        window.addEventListener('scroll', this.handleDebouncedScroll);
    },
    unmounted () {
        window.removeEventListener('scroll', this.handleDebouncedScroll);
    },
}
</script> 