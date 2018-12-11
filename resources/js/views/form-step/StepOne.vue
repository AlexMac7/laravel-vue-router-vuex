<template>
    <div>
        <b-progress height="0.25rem" :value="value" :max="max" class="mb-3"></b-progress>

        <!--Step One-->
        <b-container v-show="step === 1">
            <b-row class="mx-5">
                <b-col>
                    <h2 class="text-center my-4">What Type Of Product Do You Want?</h2>
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
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickProduct">First
                                Product
                            </button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickProduct">Second
                                Product
                            </button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickProduct">Third
                                Product
                            </button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickProduct">Fourth
                                Product
                            </button>
                        </b-card>
                    </b-card-group>
                </b-col>
            </b-row>
            <b-row class="mx-5">
                <b-col class="text-center">
                    <button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="isDisabled" @click="onClickStepOne">
                        Continue
                    </button>
                </b-col>
            </b-row>
        </b-container>

        <!--Step Two-->
        <b-container v-show="step === 2">
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
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Indica
                            </button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Sativa
                            </button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Hybrid
                            </button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Not
                                Sure
                            </button>
                        </b-card>
                    </b-card-group>
                </b-col>
            </b-row>
            <b-row class="mx-5">
                <b-col class="text-center">
                    <button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="isDisabled" @click="onClickStepTwo">
                        Continue
                    </button>
                </b-col>
            </b-row>
        </b-container>

        <!--Step Two-->
        <b-container class="bv-example-row" v-show="step === 3">
            <b-row class="mx-5">
                <b-col>
                    <h2 class="text-center my-4">Last Question</h2>
                </b-col>
            </b-row>
            <b-container class="bv-example-row">
                <b-row class="justify-content-md-center mx-5">
                    <b-col cols="12" md="8">
                        <b-form-input v-model="selections.lastQuestion"
                                      type="text"
                                      placeholder="Enter your name"
                                      size="lg">
                        </b-form-input>
                    </b-col>
                </b-row>
            </b-container>
            <b-row class="m-5">
                <b-col class="text-center">
                    <!--TODO disable button based on last question input length-->
                    <button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="selections.lastQuestion.length < 3" @click="onClickSubmit">
                        Submit
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
                isDisabled: true,
                step: 1,
                value: 0,
                max: 100,
                selections: {
                    product: '', //TODO: ensure this is updated even if it isn't being used in the template... wtf Vue
                    strain: '', //TODO: ensure this is updated even if it isn't being used in the template... wtf Vue
                    lastQuestion: '',
                }
            }
        },

        methods: {
            onClickStepOne(event) {
                event.preventDefault();

                this.value = 33;
                this.step = 2;
                this.isDisabled = true;
            },

            onClickStepTwo(event) {
                event.preventDefault();

                this.value = 66;
                this.step = 3;
                this.isDisabled = true;
            },

            onClickSubmit(event) {
                event.preventDefault();

                this.value = 100;
                this.isDisabled = true;
            },

            onClickProduct(event) {
                event.preventDefault();

                this.selections.product = event.target.innerHTML;
                this.isDisabled = false;
            },

            onClickStrain(event) {
                event.preventDefault();

                this.selections.strain = event.target.innerHTML;
                this.isDisabled = false;
            },
        }
    }
</script>