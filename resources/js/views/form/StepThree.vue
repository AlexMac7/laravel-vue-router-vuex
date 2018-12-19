<template>
    <div>
        <b-progress height="0.25rem" :value="this.$store.getters.progressValue" :max="100" class="mb-3"></b-progress>

        <!--Step Three-->
        <b-container class="bv-example-row" v-show="this.$store.getters.currentStep === 3">
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
                                            <b-button type="submit" variant="primary">
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
    export default {
        data() {
            return {
                selections: {
                    name: '',
                    email: '',
                },
            }
        },

        methods: {
            onSubmit(event) {
                event.preventDefault();

                this.$store.commit({
                    type: 'updateSelections',
                    selections: this.selections,
                });

                const selections = this.$store.state.selections;

                axios.post('/api/leads', {
                    product: selections.product,
                    strain: selections.strain,
                    name: selections.name,
                    email: selections.email,
                }).then((response) => {
                    this.$store.commit({
                        type: 'clearSelections',
                    });

                    this.$store.commit({
                        type: 'updateStepData',
                        stepData: {
                            progressValue: 0,
                            step: 1,
                            isDisabled: true,
                        },
                    });

                    this.$router.push('/')
                }).catch((error) => {
                    alert(error);
                });
            },

            onReset(event) {
                event.preventDefault();

                this.selections.name = '';
                this.selections.email = '';

                /* Trick to reset/clear native browser form validation state */
                this.show = false;
                this.$nextTick(() => {
                    this.show = true
                });
            }
        }
    }
</script>
