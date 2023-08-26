<template>
  <PageHeader></PageHeader>
  <BaseBreadcrumbs class="py-7"></BaseBreadcrumbs>
  <div style="background-image:url('./images/bg.jpg')" class="page-image-bg">
    <div class="container">
      <TextEditor class="pb-12">
        <template #content>
          <div>
            <img src="../assets/images/cake4.jpg" alt="news4" class="rounded-2xl w-full lg:w-1/2 lg:float-left lg:mr-8 mb-4 lg:mb-0 lg:mb-8">
            <div class="lg:pt-36">
              <h2 class="font-medium text-24 xl:text-38 mb-6">Amazing Vegan Cake Smoothie</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
              </p>
              <br>
              <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
              </p>
              <div class="sm:w-4/5 sm:mx-auto my-2 md:w-full flex flex-wrap -mx-4 md:-mx-4">
                <div class="w-full md:w-1/3 p-4">
                  <img src="../assets/images/about2.jpg" alt="" class="rounded-xl">
                </div>
                <div class="w-full md:w-1/3 p-4">
                  <img src="../assets/images/about3.jpg" alt="" class="rounded-xl">
                </div>
                <div class="w-full md:w-1/3 p-4">
                  <img src="../assets/images/about4.jpg" alt="" class="rounded-xl">
                </div>
            </div>
              <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
              </p>
              <br>
              <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
              </p>
              <br>
              <h4 class="mb-2">Quas laborum inventore quibusdam eum</h4>
              <ul class="mb-2">
                <li>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi accusamus voluptates nostrum, necessitatibus culpa voluptatum aperiam minima amet, rerum quis quas laborum inventore quibusdam eum, quia voluptatem voluptas magni repudiandae!
                </li>
                <li>
                  Adipisicing elit. Animi accusamus voluptates nostrum, necessitatibus culpa voluptatum aperiam minima amet, rerum quis quas laborum inventore quibusdam eum, quia!
                </li>
                <li>
                  Consectetur adipisicing elit. Animi accusamus voluptates nostrum, necessitatibus culpa voluptatum aperiam minima amet, rerum quis quas laborum inventore quibusdam eum, quia voluptatem voluptas magni repudiandae!
                </li>
                <li>
                  Sit amet consectetur adipisicing elit. Animi accusamus voluptates nostrum, necessitatibus culpa voluptatum aperiam minima amet, rerum quis quas laborum inventore quibusdam eum quas laborum inventore quibusdam eum.
                </li>
                <li>
                  Ipsum dolor sit amet consectetur adipisicing elit. Animi accusamus voluptates nostrum, necessitatibus culpa voluptatum aperiam minima amet, rerum quis quas laborum inventore quibusdam eum, quia voluptatem voluptas magni repudiandae!
                </li>
                <li>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi accusamus voluptates nostrum, necessitatibus culpa voluptatum aperiam minima amet, rerum quis quas laborum inventore quibusdam eum, quia voluptatem voluptas magni repudiandae!
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi accusamus voluptates nostrum, necessitatibus culpa voluptatum aperiam minima amet, rerum quis quas laborum inventore quibusdam eum, quia voluptatem voluptas magni repudiandae!
                </li>
              </ul>
            </div>
            
          </div>
        </template>
      </TextEditor>
    </div>
  </div>
  <PageFooter></PageFooter>
</template>
<script>
  import BaseBreadcrumbs from '../components/breadcrumbs/BaseBreadcrumbs.vue';
  export default {
    components: {BaseBreadcrumbs}
  }
</script>