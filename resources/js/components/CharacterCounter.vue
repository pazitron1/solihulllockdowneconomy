<script>
    export default {
        props: ['limit'],
        data() {
            return {
                message: '',
                totalCharacters: 0
            }
        },
        methods: {
            charCount() {
                this.totalCharacters = this.message.length;
            }
        },
        computed: {
            computedClass(){
                if (this.totalCharacters >= this.limit) {
                    return 'text-red-500'
                }
            }
        }
    }
</script>
