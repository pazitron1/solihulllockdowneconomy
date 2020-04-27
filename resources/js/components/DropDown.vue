<script>
    export default {
        data() {
            return {
                isDropDownOpen : false
            }
        },
        created() {
            const handleEscape = (e) => {
                if (e.key === 'Esc' || e.key === 'Escape') {
                    this.isDropDownOpen = false;
                }
            };
            document.addEventListener('keydown', handleEscape);
            this.$once('hook:beforeDestroy', () => {
                document.removeEventListener('keydown', handleEscape);
            });
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .6s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }
</style>
