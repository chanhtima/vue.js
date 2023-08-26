<template>
  <PageHeader></PageHeader>
  <BaseBreadcrumbs class="py-7"></BaseBreadcrumbs>
  <div style="background-image:url('./images/bg.jpg')" class="page-image-bg pb-12">
    <div class="container">
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
          <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-1/2 p-4">
              <img src="../assets/images/about2.jpg" alt="GRACIAS CAFE" class="rounded-2xl">
            </div>
            <div class="w-full lg:w-1/2 px-4 pb-4 pt-12 lg:pt-20">
              <div class="relative mb-6 sm:mb-10">
                <p class=" relative z-[1] text-gray-400">Lorem ipsum dolor sit amet,</p>
                <h2 class="text-24 sm:text-30 md:text-38 relative z-[1] -mt-2">THE FARMER’S DIARY</h2>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                laoreet dolore magna aliquam erat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
              </p>
            </div>
          </div>
          <div class="mt-10 text-center">
            <div class="relative mb-6">
              <h2 class="text-24 sm:text-30 md:text-38 relative z-[1] -mt-2">ABOUT GRACIAS CAFE</h2>
            </div>
            <p>
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet
              dolore magna aliquam erat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
              euismod tincidunt ut laoreet dolore magna aliquam erat Lorem ipsum dolor sit amet, consectetuer adipiscing
              elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat Lorem ipsum dolor sit
              amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
              erat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
              laoreet dolore magna aliquam erat
            </p>
          </div>
          <div class="flex flex-wrap -mx-4 items-center mt-4">
            <div class="w-full md:w-1/3 p-4"><img src="../assets/images/about3.jpg" alt="GRACIAS CAFE"
                class="rounded-2xl w-full"></div>
            <div class="w-full md:w-1/3 p-4"><img src="../assets/images/about4.jpg" alt="GRACIAS CAFE"
                class="rounded-2xl w-full"></div>
            <div class="w-full md:w-1/3 p-4"><img src="../assets/images/about3.jpg" alt="GRACIAS CAFE"
                class="rounded-2xl w-full"></div>
          </div>
      </template>
    </TextEditor>
  </div>
</div>
<PageFooter></PageFooter></template>
<script>
  import BaseBreadcrumbs from '../components/breadcrumbs/BaseBreadcrumbs.vue'
  export default {
    components: { BaseBreadcrumbs }
  }
</script>