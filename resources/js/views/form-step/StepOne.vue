<template>
    <div>
        <b-progress height="0.25rem" :value="value" :max="max" class="mb-3"></b-progress>

        <!--&lt;!&ndash;Step One&ndash;&gt;-->
        <!--<b-container v-show="step === 1">-->
        <!--<b-row class="mx-5">-->
        <!--<b-col>-->
        <!--<h2 class="text-center my-4">What Type Of Product Do You Want?</h2>-->
        <!--</b-col>-->
        <!--</b-row>-->
        <!--<b-row class="m-5 text-center">-->
        <!--<b-col lg="6" class="my-2">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg btn-block" @click="onClickProduct">First-->
        <!--Product-->
        <!--</button>-->
        <!--</b-col>-->
        <!--<b-col lg="6" class="my-2">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg btn-block" @click="onClickProduct">Second-->
        <!--Product-->
        <!--</button>-->
        <!--</b-col>-->
        <!--<b-col lg="6" class="my-2">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg btn-block" @click="onClickProduct">Third-->
        <!--Product-->
        <!--</button>-->
        <!--</b-col>-->
        <!--<b-col lg="6" class="my-2">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg btn-block" @click="onClickProduct">Fourth-->
        <!--Product-->
        <!--</button>-->
        <!--</b-col>-->
        <!--</b-row>-->
        <!--<b-row class="mx-5">-->
        <!--<b-col class="text-center">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="isDisabled" @click="onClickStepOne">-->
        <!--Continue-->
        <!--</button>-->
        <!--</b-col>-->
        <!--</b-row>-->
        <!--</b-container>-->

        <!--&lt;!&ndash;Step Two&ndash;&gt;-->
        <!--<b-container v-show="step === 2">-->
        <!--<b-row class="mx-5">-->
        <!--<b-col>-->
        <!--<h2 class="text-center my-4">What Type Of Strain Are You Looking For?</h2>-->
        <!--</b-col>-->
        <!--</b-row>-->
        <!--<b-row class="m-5">-->
        <!--<b-col>-->
        <!--<b-card-group deck>-->
        <!--<b-card img-src="https://picsum.photos/300/300/?image=41"-->
        <!--img-alt="Img"-->
        <!--img-top-->
        <!--fluid-->
        <!--class="text-center">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Indica-->
        <!--</button>-->
        <!--</b-card>-->
        <!--<b-card img-src="https://picsum.photos/300/300/?image=41"-->
        <!--img-alt="Img"-->
        <!--img-top-->
        <!--fluid-->
        <!--class="text-center">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Sativa-->
        <!--</button>-->
        <!--</b-card>-->
        <!--<b-card img-src="https://picsum.photos/300/300/?image=41"-->
        <!--img-alt="Img"-->
        <!--img-top-->
        <!--fluid-->
        <!--class="text-center">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Hybrid-->
        <!--</button>-->
        <!--</b-card>-->
        <!--<b-card img-src="https://picsum.photos/300/300/?image=41"-->
        <!--img-alt="Img"-->
        <!--img-top-->
        <!--fluid-->
        <!--class="text-center">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Not-->
        <!--Sure-->
        <!--</button>-->
        <!--</b-card>-->
        <!--</b-card-group>-->
        <!--</b-col>-->
        <!--</b-row>-->
        <!--<b-row class="mx-5">-->
        <!--<b-col class="text-center">-->
        <!--<button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="isDisabled" @click="onClickStepTwo">-->
        <!--Continue-->
        <!--</button>-->
        <!--</b-col>-->
        <!--</b-row>-->
        <!--</b-container>-->

        <!--Step Two-->
        <!--<b-container class="bv-example-row" v-show="step === 3">-->
        <b-container class="bv-example-row">
            <b-row class="mx-5">
                <b-col>
                    <h2 class="text-center my-4">Last Question</h2>
                </b-col>
            </b-row>
                <b-row class="justify-content-md-center mx-5">
                    <!--TODO: Form isn't aligned properly on mobile, has to do with the width 75-->
                    <b-form @submit="onSubmit" @reset="onReset" class="w-75">
                        <b-form-group id="exampleInputGroup1"
                                      label="Email address:"
                                      label-for="exampleInput1"
                                      description="We'll never share your email with anyone else.">
                            <b-form-input id="exampleInput1"
                                          type="email"
                                          v-model="form.email"
                                          required
                                          placeholder="Enter email">
                            </b-form-input>
                        </b-form-group>
                        <b-form-group id="exampleInputGroup2"
                                      label="Your Name:"
                                      label-for="exampleInput2">
                            <b-form-input id="exampleInput2"
                                          type="text"
                                          v-model="form.name"
                                          required
                                          placeholder="Enter name">
                            </b-form-input>
                        </b-form-group>
                            <b-col class="text-center my-5">
                                <button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="selections.lastQuestion.length < 3" @click="onClickSubmit">
                                    Submit
                                </button>
                            </b-col>
                    </b-form>
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
                },
                form: {
                    email: '',
                    name: '',
                    food: null,
                    checked: []
                },
            }
        },

        methods: {
            onSubmit (evt) {
                evt.preventDefault();
                alert(JSON.stringify(this.form));
            },
            onReset (evt) {
                evt.preventDefault();
                /* Reset our form values */
                this.form.email = '';
                this.form.name = '';
                this.form.food = null;
                this.form.checked = [];
                /* Trick to reset/clear native browser form validation state */
                this.show = false;
                this.$nextTick(() => { this.show = true });
            },
            //TODO: ABOVE
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