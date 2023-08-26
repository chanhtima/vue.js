<template>
  <PageHeader></PageHeader>
  <BaseBreadcrumbs class="py-7"></BaseBreadcrumbs>
  <div style="background-image:url('./images/bg.jpg')" class="page-image-bg">
    <div class="container">
      <Card01Horizontal v-bind="highlightNews[0]">
        <template #action>
          <div class="py-12">
            <BaseButton url="/news-event-detail" text="Read More">
              <template #icon>
                <svg width="35" height="14" class="mt-1" viewBox="0 0 35 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M33.0396 7.11658L33.7467 6.40947L34.4538 7.11658L33.7467 7.82368L33.0396 7.11658ZM1.03955 8.11658C0.487267 8.11658 0.0395508 7.66886 0.0395508 7.11658C0.0395508 6.56429 0.487267 6.11658 1.03955 6.11658V8.11658ZM27.7467 0.40947L33.7467 6.40947L32.3324 7.82368L26.3324 1.82368L27.7467 0.40947ZM33.7467 7.82368L27.7467 13.8237L26.3324 12.4095L32.3324 6.40947L33.7467 7.82368ZM33.0396 8.11658H1.03955V6.11658H33.0396V8.11658Z"
                        fill="#FFF9F0" />
                </svg>
              </template>
            </BaseButton>
          </div>
        </template>
      </Card01Horizontal>
      <NewsEventLayout></NewsEventLayout>
      <BasePagination class="pt-4 pb-8"></BasePagination>
    </div>
  </div>
  <PageFooter></PageFooter>
</template>
<script>
import BaseBreadcrumbs from '../components/breadcrumbs/BaseBreadcrumbs.vue';
import Card01Horizontal from '../components/card/Card01Horizontal.vue';
import NewsEventLayout from '../layouts/NewsEventLayout.vue';
import BasePagination from '../components/pagination/BasePagination.vue';
import BaseButton from '../components/button/BaseButton.vue';
export default {
  components: { BaseBreadcrumbs, Card01Horizontal, NewsEventLayout, BasePagination ,BaseButton},
  setup() {
    const highlightNews = [
      {
        'id': '1',
        'img': './images/news1.jpg',
        'title': 'Therefore, when you title research work',
        'detail': 'Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.Therefore, when you title research work, make sure it captures all of the relevant aspects of your study, including the specific topic and problem being investigated.',
        'date': '20-Jun-2023',
        'url': '/news-event-detail'
      },
    ]
    return { highlightNews }
  }
}
</script>