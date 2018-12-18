<template>
    <div>
        <b-progress height="0.25rem" :value="this.$store.getters.getProgressValue" :max="100" class="mb-3"></b-progress>

        <!--Step One-->
        <b-container v-show="this.$store.getters.getStep === 1">
            <b-row class="mx-5">
                <b-col>
                    <h2 class="text-center my-4">What Type Of Product Do You Want?</h2>
                </b-col>
            </b-row>
            <b-row class="m-5 text-center">
                <b-col lg="6" class="my-2">
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block" @click="onClickProduct">First
                        Product
                    </button>
                </b-col>
                <b-col lg="6" class="my-2">
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block" @click="onClickProduct">
                        Second Product
                    </button>
                </b-col>
                <b-col lg="6" class="my-2">
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block" @click="onClickProduct">Third
                        Product
                    </button>
                </b-col>
                <b-col lg="6" class="my-2">
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block" @click="onClickProduct">
                        Fourth Product
                    </button>
                </b-col>
            </b-row>
            <b-row class="mx-5">
                <b-col class="text-center">
                    <button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="this.$store.getters.getIsDisabled" @click="onClickStepOne">
                        Continue
                    </button>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                selections: {
                    product: '',
                    strain: '',
                    name: '',
                    email: '',
                },
            }
        },

        methods: {
            onClickStepOne(event) {
                event.preventDefault();

                this.$store.commit({
                    type: 'updateSelections',
                    selections: this.selections,
                });

                this.$store.commit({
                    type: 'updateStepData',
                    stepData: {
                        progressValue: 33,
                        step: 2,
                        isDisabled: true,
                    },
                });

                this.$router.push('/form-step-two');
            },

            onClickProduct(event) {
                event.preventDefault();

                this.selections.product = event.target.innerHTML;
                this.$store.commit({
                    type: 'updateStepData',
                    stepData: {
                        progressValue: 0,
                        step: 1,
                        isDisabled: false,
                    },
                });
            },
        }
    }
</script>
