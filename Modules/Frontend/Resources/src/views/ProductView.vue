<template>
  <PageHeader></PageHeader>
  <BaseBreadcrumbs class="py-7"></BaseBreadcrumbs>
  <div style="background-image:url('./images/bg.jpg')" class="page-image-bg">
     <div class="container">
        <div class="text-center">
         <h1 class="font-medium text-24 xl:text-38 mb-6 line-pass">OUR PRODUCT</h1>
        </div>
        <TextEditor>
           <template #content>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                 laoreet dolore magna aliquam erat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                 nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat Lorem ipsum dolor sit amet,
                 consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                 erat Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                 laoreet dolore magna aliquam erat </p>
           </template>
        </TextEditor>
        <ProductListLayout/>
        <BasePagination class="pt-4 pb-8"/>
     </div>
  </div>
  <PageFooter></PageFooter>
</template>

<script>
import BaseBreadcrumbs from '../components/breadcrumbs/BaseBreadcrumbs.vue'
import TextEditor from '../components/texteditor/TextEditor.vue'
import BasePagination from '../components/pagination/BasePagination.vue';
import ProductListLayout from '../layouts/ProductListLayout.vue';
export default {
  components: { TextEditor, BaseBreadcrumbs, BasePagination, ProductListLayout },
  setup() {
    
  }
}
</script>