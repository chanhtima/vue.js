<template>
    <ul class="co-base-pagination" role="pagination" aria-label="Pagination">
        <li>
            <a href="">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
        <li class="co-pagination-basic-current"><a href="">1</a></li>
        <li><a href="">2</a></li> 
        <li><a href="">3</a></li>
        <li><a href="">4</a></li>
        <li>
            <a href="">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
    </ul>
</template>
<script>
export default {
    name: 'BasePagination'
}
</script>