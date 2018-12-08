<template>
    <b-row>
        <b-col></b-col>
        <b-col cols="10" class="m-5">
            <b-form @submit="onSubmit" @reset="onReset">
                <b-form-group id="exampleInputGroup1"
                              label="Name:"
                              label-for="exampleInput1"
                              description="It'll be wickehd awehsome.">
                    <b-form-input id="exampleInput1"
                                  type="text"
                                  v-model="form.name"
                                  required
                                  placeholder="Enter the name"
                                    name="exampleInput1">
                    </b-form-input>
                </b-form-group>
                <b-form-group id="exampleInputGroup2"
                              label="Location:"
                              label-for="exampleInput2">
                    <b-form-input id="exampleInput2"
                                  type="text"
                                  v-model="form.location"
                                  required
                                  placeholder="Enter the location">
                    </b-form-input>
                </b-form-group>
                <b-form-group id="exampleInputGroup3"
                              label="Description:"
                              label-for="exampleInput3">
                    <b-form-input id="exampleInput3"
                                   type="text"
                                   v-model="form.description"
                                   required
                                   placeholder="Enter a description">
                    </b-form-input>
                </b-form-group>
                <b-form-group id="exampleInputGroup4"
                              label="Price:"
                              label-for="exampleInput4">
                    <b-form-input id="exampleInput4"
                                   type="number"
                                   v-model="form.price"
                                   required
                                   placeholder="Enter a price in cents">
                    </b-form-input>
                </b-form-group>
                <b-button type="submit" variant="primary">Submit</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
            </b-form>
        </b-col>
        <b-col></b-col>
    </b-row>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    location: '',
                    description: '',
                    price: '',
                },
            }
        },
        methods: {
            onSubmit(event) {
                event.preventDefault();

                axios.post('/api/holiday-destinations', {
                    name: this.form.name,
                    location: this.form.location,
                    description: this.form.description,
                    price: this.form.price,
                }).then((response) => {
                    this.$store.commit({
                        type: 'updateDestinations',
                        destination: response.data.data
                    });
                }).catch((error) => {
                    alert(error);
                });
            },
            onReset(event) {
                event.preventDefault();
                /* Reset our form values */
                this.form.name = '';
                this.form.location = '';
                this.form.description = '';
                this.form.price = '';
            }
        }
    }
</script>
