
<script>
    export default {
        props: ['business'],

        methods: {
            deleteEntry() {
                axios.delete('/dashboard/businesses/' + this.business.slug)
                    .then(({data}) => {
                        location.reload();
                    })
            }
        }
    }
</script>

