<template>
    <div class="alert alert-success alert_flash" v-show="show">
        <strong>Success!</strong> {{ body }}
    </div>
</template>

<script>
    export default {
        props: ['message'],

        data() {
            return {
                body : '',
                show: false
            }
        },

        created() {
            if(this.message) {
                 this.flash(this.message)
            }

            window.events.$on('flash', message => {
                this.flash(message)
            })
        },

        methods : {
            hide() {
                setTimeout(() => {
                    this.show = false
                }, 3000);
            },

            flash(message) {
                this.body = message;
                this.show = true;

                this.hide();
            }
        }
    }
</script>

<style>
    .alert_flash {
        position: fixed;
        right: 25px;
        top: 5px;
        margin-right: 0.8em;
    }
</style>
