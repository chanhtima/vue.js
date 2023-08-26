<template>
    <TextEditor>
        <template #content>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-1/2 px-4 pb-4 pt-12 lg:pt-20">
                    <div class="relative mb-6 sm:mb-10">
                        <p class=" relative z-[1] text-gray-400">Lorem ipsum dolor sit amet,</p>
                        <h2 class="text-24 sm:text-30 md:text-38 relative z-[1] -mt-2">ABOUT GRACIAS CAFE</h2>
                        <img src="../assets/images/about-text.png" alt="GRACIAS CAFE"
                            class="w-1/2 lg:w-auto absolute top-0 -left-4 lg:-left-12 z-0">
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                        laoreet dolore magna aliquam erat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                    </p>
                </div>
                <div class="w-full lg:w-1/2 p-4">
                    <img src="../assets/images/about.png" alt="GRACIAS CAFE">
                </div>
            </div>
        </template>
    </TextEditor>
</template>
<script>
import TextEditor from '../components/texteditor/TextEditor.vue';
export default {
    name: "HomeAbout",
    setup() {
        return {};
    },
    components: { TextEditor }
}
</script>