<template>
        <div>
                <delivery v-on:fastLink="changeSide($event)"></delivery>
                <autocomplete :items="cities" v-on:input="autoSearch($event),listCost()" @input="checkForm" @keyup.enter="onEnter" v-bind:errors="errors"></autocomplete>
                <shippingcost v-if="delivery.length" :delivery="delivery"></shippingcost>
                <indexshipping v-else></indexshipping>
        </div>
</template>

<script>
    import delivery from "./components/delivery.vue";
    import indexshipping from "./components/index-shipping.vue";
    import shippingcost from "./components/shippingcost.vue";
    import autocomplete from "./components/autocomplete.vue";

    export default {
        components: {
            'delivery': delivery,
            'indexshipping': indexshipping,
            'shippingcost': shippingcost,
            'autocomplete': autocomplete,
        },
        name: "App",
        data: function () {
            return {
                delivery:{
                    tyre: [],
                    required: true,
                },
                city: null,
                cities: [
                    'Almaty', 'Alatau', 'Almaly', 'Almarasan'
                ],
                errors: []
            }
        },
        methods: {
            onEnter() {
                if (delivery.length){
                    this.errors.push('We didn’t found such city. Please check spelling');
                }
            },
            checkForm: function (e) {
                if (this.city) {
                    return true;
                }

                this.errors = [];

                if (!this.city) {
                    this.errors.push('We didn’t found such city. Please check spelling');
                }

                e.preventDefault();
            },
            listCost: function() {
                axios.get('http://localhost:8080/delivery/check',{
                    params: {
                        search: this.city
                    }
                }).then(response => {
                    this.delivery = response.data
                }).catch(error => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
            },
            changeSide: function (value) {
                this.delivery = value;
            },
            autoSearch: function (value) {
                this.city = value;
            }

        }
    }
</script>