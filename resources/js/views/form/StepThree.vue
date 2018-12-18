<template>
    <div>
        <b-progress height="0.25rem" :value="this.$store.getters.getProgressValue" :max="100" class="mb-3"></b-progress>

        <!--Step Three-->
        <b-container class="bv-example-row" v-show="this.$store.getters.getStep === 3">
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
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required v-model="selections.email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
                                        <div class="col-md-7">
                                            <input id="name" type="text" name="name" class="form-control" placeholder="Name" required v-model="selections.name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-8 offset-md-3">
                                            <b-button type="submit" variant="primary" :disabled="this.$store.getters.getIsDisabled">
                                                Submit
                                            </b-button>
                                            <b-button type="reset" variant="danger">Reset</b-button>
                                        </div>
                                    </div>
                                </b-form>
                            </div>
                        </div>
                    </div>
                </div>
            </b-container>
        </b-container>
    </div>
</template>
<script>
    //TODO
    export default {
        data() {
            return {
                isDisabled: true,
                step: 1,
                progressValue: 0,
                max: 100,
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

                this.progressValue = 33;
                this.step = 2;
                this.isDisabled = true;

                this.$store.commit({
                    type: 'updateSelections',
                    selections: this.selections,
                });
            },

            onClickStepTwo(event) {
                event.preventDefault();

                this.progressValue = 66;
                this.step = 3;
                this.isDisabled = true;

                this.$store.commit({
                    type: 'updateSelections',
                    selections: this.selections,
                });
            },

            onSubmit(event) {
                event.preventDefault();

                this.progressValue = 100;

                axios.post('/api/leads', {
                    product: this.selections.product,
                    strain: this.selections.strain,
                    name: this.selections.name,
                    email: this.selections.email,
                }).then((response) => {
                    this.selections.product = '';
                    this.selections.strain = '';
                    this.selections.name = '';
                    this.selections.email = '';
                    this.progressValue = 0;

                    this.$store.commit({
                        type: 'updateSelections',
                        selections: this.selections,
                    });

                    this.$router.push('/')
                }).catch((error) => {
                    alert(error);
                });
            },

            onReset(event) {
                event.preventDefault();

                this.selections.product = '';
                this.selections.strain = '';
                this.selections.name = '';
                this.selections.email = '';
                this.progressValue = 0;

                this.$store.commit({
                    type: 'updateSelections',
                    selections: this.selections,
                });
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
