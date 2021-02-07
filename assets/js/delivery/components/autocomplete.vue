<template>
    <form method="get" @submit.prevent="listCost">
        <div class="autocomplete">
            <ul id="autocomplete-results" v-show="isOpen" class="autocomplete-results">
                <li class="loading" v-if="isLoading">
                    Loading results...
                </li>
                <li v-else v-for="(result, i) in results" :key="i" @click="setResult(result)" class="autocomplete-result" :class="{ 'is-active': i === arrowCounter }">
                    {{ result }}
                </li>
            </ul>
            <input name="search" type="text" class="v3_155" placeholder="Enter name of the city" @input="onChange" v-model="search" @keyup.down="onArrowDown" @keyup.up="onArrowUp" @keyup.enter="onEnter">

            <div v-if="errors.length">
                <div v-for="e in errors">
                    <span class="error-mes">{{e}}</span>
                </div>

                <input class="error-button" @click="reset"><img class="error-close" src="/images/close.svg" alt="">
            </div>
            <div v-else><input type="submit" class="v3_156" @click="checkForm"></div>
        </div>
    </form>
</template>

<script>
    export default {
        name: "autocomplete",
        props: {
            items: {
                type: Array,
                required: false,
                default: () => []
            },
            isAsync: {
                type: Boolean,
                required: false,
                default: false
            },
            errors: [],
        },

        data() {
            return {
                isOpen: false,
                results: [],
                search: "",
                isLoading: false,
                arrowCounter: 0,
            };
        },

        methods: {
            reset(){
                this.errors.splice(0);
            },
            checkForm: function (e) {
                if (this.search) {
                    return true;
                }

                this.errors = [];

                if (!this.search) {
                    this.errors.push('We didn’t found such city. Please check spelling');
                }

                e.preventDefault();
            },
            listCost: function() {
                axios.get('http://localhost:8080/delivery/check',{
                    params: {
                        search: this.search
                    }
                }).then(response => {
                    this.delivery = response.data
                }).catch(error => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
            },
            onChange() {
                this.$emit("input", this.search);

                if (this.isAsync) {
                    this.isLoading = true;
                } else {
                    this.filterResults();
                    this.isOpen = true;
                }
            },

            filterResults() {
                this.results = this.items.filter(item => {
                    return item.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                });
            },
            setResult(result) {
                this.search = result;
                this.isOpen = false;
            },
            onArrowDown(evt) {
                if (this.arrowCounter < this.results.length) {
                    this.arrowCounter = this.arrowCounter + 1;
                }
            },
            onArrowUp() {
                if (this.arrowCounter > 0) {
                    this.arrowCounter = this.arrowCounter - 1;
                }
            },
            onEnter() {
                this.search = this.results[this.arrowCounter];
                this.isOpen = false;
                this.arrowCounter = -1;
                this.$emit("input", this.search);
            },
            handleClickOutside(evt) {
                if (!this.$el.contains(evt.target)) {
                    this.isOpen = false;
                    this.arrowCounter = -1;
                }
            }
        },
        watch: {
            items: function(val, oldValue) {
                if (val.length !== oldValue.length) {
                    this.results = val;
                    this.isLoading = false;
                }
            }
        },
        mounted() {
            document.addEventListener("click", this.handleClickOutside);
        },
        destroyed() {
            document.removeEventListener("click", this.handleClickOutside);
        }
    }
</script>

<style scoped>

</style>