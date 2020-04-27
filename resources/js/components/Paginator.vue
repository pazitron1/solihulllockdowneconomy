<template>
    <ul class="flex justify-center" v-if="shouldPaginate">
        <li class="mr-2 p-2 text-base font-normal text-gray-500 hover:text-indigo-600 cursor-pointer" v-show="prevUrl">
            <a class="flex items-center" href="#" aria-label="Back" rel="prev" @click.prevent="page--">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 mr-1"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
                <span aria-hidden="true">Back</span>
            </a>
        </li>
         <li class="ml-2 p-2 text-base font-normal text-gray-500 hover:text-indigo-600 cursor-pointer" v-show="nextUrl">
            <a class="flex items-center" href="#" aria-label="Next" rel="next" @click.prevent="page++">
                <span aria-hidden="true">Next</span>
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 ml-1"><path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </a>
        </li>
    </ul>
</template>

<script>

  export default {
    props: ['dataSet'],
    data() {
      return {
        page: 1,
        prevUrl: false,
        nextUrl: false
      }
    },

    watch: {
      dataSet() {
        this.page = this.dataSet.data.current_page;
        this.prevUrl = this.dataSet.data.prev_page_url;
        this.nextUrl = this.dataSet.data.next_page_url;
      },
      page() {
        this.broadcast().updateUrl();
      }
    },
    computed: {
      shouldPaginate() {
        return !! this.prevUrl || !! this.nextUrl;
      }
    },

    methods: {
      broadcast() {
        return this.$emit('updated', this.page);
      },

      updateUrl() {
        history.pushState(null, null, '?page=' + this.page);
      }
    }
  }
</script>
