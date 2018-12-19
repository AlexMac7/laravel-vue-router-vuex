<template>
    <div>
        <b-progress height="0.25rem" :value="this.$store.getters.progressValue" :max="100" class="mb-3"></b-progress>

        <!--Step Two-->
        <b-container v-show="this.$store.getters.currentStep === 2">
            <b-row class="mx-5">
                <b-col>
                    <h2 class="text-center my-4">What Type Of Strain Are You Looking For?</h2>
                </b-col>
            </b-row>
            <b-row class="m-5">
                <b-col>
                    <b-card-group deck>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" value='indica' @click="onClickStrain">Indica</button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" value='sativa' @click="onClickStrain">Sativa</button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" value='hybrid' @click="onClickStrain">Hybrid</button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" value='unsure' @click="onClickStrain">Not Sure</button>
                        </b-card>
                    </b-card-group>
                </b-col>
            </b-row>
            <b-row class="mx-5">
                <b-col class="text-center">
                    <button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="this.$store.getters.isDisabled" @click="onClickStepTwo">
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
                    strain: '',
                },
            }
        },

        methods: {
            onClickStepTwo(event) {
                event.preventDefault();

                this.$store.commit({
                    type: 'updateSelections',
                    selections: this.selections,
                });

                this.$store.commit({
                    type: 'updateStepData',
                    stepData: {
                        progressValue: 66,
                        step: 3,
                        isDisabled: true,
                    },
                });

                this.$router.push('/form-step-three');
            },

            onClickStrain(event) {
                event.preventDefault();

                this.selections.strain = event.target.value;

                this.$store.commit({
                    type: 'updateStepData',
                    stepData: {
                        progressValue: 33,
                        step: 2,
                        isDisabled: false,
                    },
                });
            },
        }
    }
</script>
