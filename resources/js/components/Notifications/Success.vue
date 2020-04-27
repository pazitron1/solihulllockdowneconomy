<template>
    <transition name="fade">
        <div class="alert-flash bg-white shadow-xl border border-gray-300 px-4 py-4 rounded-lg relative flex items-start justify-between" role="alert" v-show="show">
            <div class="flex items-center">
                <svg fill="currentColor" viewBox="0 0 20 20" class="text-green-600 w-6 h-6 mr-2"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="flex flex-col">
                <span class="block text-gray-700 sm:inline text-base">Success!</span>
                <span class="block text-gray-500 sm:inline text-sm">{{ body }}</span>
            </div>
            <button @click="close" class="focus:outline-none">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="text-gray-500 w-6 h-6 ml-2"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </transition>
</template>

<script>
    export default {
        props: ['message'],

        data() {
            return {
                body: this.message,
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            // window.events.$on('flash', message => {
            //     this.flash('message');
            // });
        },

        methods: {
            flash(message) {
                this.body = message;
                this.show = true;

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 7000);
            },

            close() {
                this.show = false;
            }
        }
    }
</script>

<style scoped>
    .alert-flash {
        position: fixed;
        top: 90px;
        right: 25px;
    }
    .v--modal-overlay {
        background:rgba(240, 244, 248, 0.75);
    }
    .fade-enter-active, .fade-leave-active {
      transition: opacity .6s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }
</style>
