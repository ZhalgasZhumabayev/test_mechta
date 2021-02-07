<template>
    <div>
        <main :msg="text"></main>
    </div>
</template>

<script>
    import Main from "./components/main.vue";
    export default {
        components: {
          'main': Main
        },
        name: "App",
        data: function () {
            return {
                text: 'Hello World!!!'
            }
        }    
}
</script>