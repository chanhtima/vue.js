<template>
  <PageHeader></PageHeader>


  <!-- <img src="../assets/images/Banner.jpg" alt="" class="w-full"> -->
  <BannerSlide></BannerSlide>

  <!-- Background image class -->
  <div style="background-image:url('../assets/images/bg.jpg')" class="page-image-bg pb-12">
    <div class="container">
      <TextEditor> 
        <template #content>
          <div class="flex flex-wrap -mx-4 xl:pt-12">
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
      <div class="text-center py-12">
        <BaseButton url="/about" text="Read Our Story">
          <template #icon>
            <svg width="35" height="14" class="mt-1" viewBox="0 0 35 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M33.0396 7.11658L33.7467 6.40947L34.4538 7.11658L33.7467 7.82368L33.0396 7.11658ZM1.03955 8.11658C0.487267 8.11658 0.0395508 7.66886 0.0395508 7.11658C0.0395508 6.56429 0.487267 6.11658 1.03955 6.11658V8.11658ZM27.7467 0.40947L33.7467 6.40947L32.3324 7.82368L26.3324 1.82368L27.7467 0.40947ZM33.7467 7.82368L27.7467 13.8237L26.3324 12.4095L32.3324 6.40947L33.7467 7.82368ZM33.0396 8.11658H1.03955V6.11658H33.0396V8.11658Z"
                    fill="#FFF9F0" />
            </svg>
          </template>
        </BaseButton>
      </div>
      <HomeOurProduct/>
      <div class="mb-12"></div>
      <HomeNewsEvents/>
    </div>
  </div>
  <PageFooter></PageFooter>
</template>
<script>
  import HomeOurProduct from '../layouts/HomeOurProduct.vue';
  import HomeNewsEvents from '../layouts/HomeNewsEvents.vue';
  import BaseButton from '../components/button/BaseButton.vue';
  import BannerSlide from '../layouts/BannerSlide.vue'
  export default{
    components:{ HomeOurProduct, HomeNewsEvents, BaseButton,BannerSlide },
    data()
    {
        const splideOption = {
            perPage: 1,
            autoplay: true,
            interval: 5000,
            type: "slide",
            pagination: false,
            arrows: true,
        };
        return{
            images: [],
            splideOption
        }
    },
    async mounted()
    {
        fetch('https://api.unsplash.com/photos/?client_id=zDeAYvbLmL6zXNomK9wJ1v2tzSJ2jz4WnTlxCV2olz4')
        .then(response => response.json())
        .then(data => this.images = data);
    }
  }
</script>

<style>
.section-head {
  @apply flex justify-between sm:justify-start items-center mb-4 ;
}

.section-wrapper {
  @apply mb-8;
}

.separator {
  height: 1px;
  background-color: black;
  width: auto;
  flex: 1;
  @apply hidden sm:block mx-4 md:mx-8;
}

.section-title {
  @apply text-24 lg:text-36 pr-6;
  font-weight: 500;
}

.see-more {
  @apply underline text-14 sm:text-18;
  text-underline-offset: 0.2em;
}
@screen sm{
  .see-more {
    text-underline-offset: 0.4em;
  }
}
</style>