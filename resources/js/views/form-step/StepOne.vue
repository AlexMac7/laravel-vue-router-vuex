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
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <div class="card card-default card-auth">
                        <div class="card-header col-md-12 text-center">
                            <h5>Last Question!</h5>
                        </div>

                        <div class="card-body-holder p-4">
                            <b-form @submit="onSubmit" @reset="onReset">
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                                    <div class="col-md-7">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required v-model="form.email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
                                    <div class="col-md-7">
                                        <input id="name" type="text" name="name" class="form-control" placeholder="Name" required v-model="form.name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        <b-button type="submit" variant="primary" :disabled="form.name.length < 3">Submit</b-button>
                                        <b-button type="reset" variant="danger">Reset</b-button>
                                    </div>
                                </div>
                            </b-form>
                        </div>
                    </div>
                </div>
            </div>
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
                },
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

            onSubmit(event) {
                event.preventDefault();
                alert(JSON.stringify(this.form));
            },

            onReset(event) {
                event.preventDefault();
                /* Reset our form values */
                this.form.email = '';
                this.form.name = '';
                /* Trick to reset/clear native browser form validation state */
                this.show = false;
                this.$nextTick(() => {
                    this.show = true
                });
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