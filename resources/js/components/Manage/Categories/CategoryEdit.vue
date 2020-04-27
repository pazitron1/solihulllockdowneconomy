
<script>
    export default {
        props: ['category'],
        data(){
            return {
                categoryObject: this.category,
                categoryname: this.category.name
            }
        },

        methods: {
            updateCategory(){
                axios.put('/manage/categories/' + this.categoryObject.slug, {
                    name: this.categoryname,
                })
                .then(function (response) {
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .6s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }
</style>
