<template>
    <div>
        <main :msg="text"></main>
    </div>
</template>

<script>
    import main from "./components/main.vue";
    export default {
        components: {
            'main': main
        },
        name: "App",
        data: function () {
            return {
                text: 'Hello World!!!'
            }
        }
    }
</script>