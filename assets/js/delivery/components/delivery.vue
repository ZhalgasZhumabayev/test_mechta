<template>
    <div class="delivery">
        <div class="v3_137">
            <span class="v3_153">Enter name of the city to count delivery cost</span>
            <span class="v3_281">Most popular cities</span>
            <a v-on:click="searchCity('nur-sultan')"><span class="v3_282">Nur - Sultan</span></a>
            <a v-on:click="searchCity('Almaty')"><span class="v3_283">Almaty</span></a>
            <a v-on:click="searchCity('Shymkent')"><span class="v3_284">Shymkent</span></a>
            <a v-on:click="searchCity('Atyrau')"><span class="v3_285">Atyrau</span></a>
            <a v-on:click="searchCity('Aktau')"><span class="v3_286">Aktau</span></a>

            <a v-on:click="searchCity('Zhana Turmis')"><span class="v3_288">Zhana Turmis</span></a>
            <a v-on:click="searchCity('Karaganda')"><span class="v3_294">Karaganda</span></a>
            <a v-on:click="searchCity('Kentau')"><span class="v3_295">Kentau</span></a>
            <a v-on:click="searchCity('Aitei')"><span class="v3_296">Aitei</span></a>
            <a v-on:click="searchCity('Pavlodar')"><span class="v3_297">Pavlodar</span></a>
            <a href=#><span class="v3_154">Delivery cost</span></a>

            <div class="v3_155"></div>
            <div class="v3_494"></div>
            <div class="v3_499"></div>
            <div class="v3_495"></div>
            <div class="v3_500"></div>
            <div class="v3_496"></div>
            <div class="v3_501"></div>
            <div class="v3_497"></div>
            <div class="v3_502"></div>
            <div class="v3_498"></div>
            <div class="v3_503"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "delivery",
        data: function () {
            return {
                delivery: {
                    type: [],
                    required: true,
                },
                city: null,
            }
        },

        methods: {
            searchCity: function (city) {
                this.city = city;
                axios.get('http://localhost:8080/delivery/check',{
                    params: {
                        search: this.city
                    }
                }).then(response => {
                    this.delivery = response.data;
                    this.$emit('fastLink', response.data);
                }).catch(error => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
            },
        }
    }
</script>

<style scoped>
</style>