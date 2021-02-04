<template>
    <div>
        <hello-world :msg="text"></hello-world>
    </div>
</template>

<script>
    import HelloWorld from "./components/main.vue";
    export default {
        components: {
          'hello-world': HelloWorld
        },
        name: "App",
        data: function () {
            return {
                text: 'Hello World!!!'
            }
        }    
}
</script>