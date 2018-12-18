<template>
    <div>
        <b-progress height="0.25rem" :value="this.$store.getters.getProgressValue" :max="100" class="mb-3"></b-progress>

        <!--Step Two-->
        <b-container v-show="this.$store.getters.getStep  === 2">
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
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Indica</button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Sativa</button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Hybrid</button>
                        </b-card>
                        <b-card img-src="https://picsum.photos/300/300/?image=41"
                                img-alt="Img"
                                img-top
                                fluid
                                class="text-center">
                            <button type="button" class="btn btn-outline-primary btn-lg" @click="onClickStrain">Not Sure</button>
                        </b-card>
                    </b-card-group>
                </b-col>
            </b-row>
            <b-row class="mx-5">
                <b-col class="text-center">
                    <button type="button" class="btn btn-outline-primary btn-lg w-50" :disabled="this.$store.getters.getIsDisabled" @click="onClickStepTwo">
                        Continue
                    </button>
                </b-col>
            </b-row>
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

                    this.$router.push({ name: "home" })
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
