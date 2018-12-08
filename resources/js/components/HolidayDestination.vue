<template>
    <div>
        <b-card bg-variant="dark" text-variant="white" :title="destination.name">
            <p class="card-text">
                Location: {{ destination.location }}
            </p>
            <p class="card-text">
                Description: {{ destination.description }}
            </p>
            <p class="card-text">
                Price (cents): {{ destination.price }}
            </p>
        </b-card>
    </div>
</template>
<script>
    export default {
        props: {
            slug: {
                type: String,
                required: true,
            },
        },
        data() {
            return {
                destination: {
                    id: null,
                    name: null,
                    slug: null,
                    location: null,
                    description: null,
                    price: null,
                    created_at: null,
                    updated_at: null
                },
            }
        },

        created() {
            this.getHolidayDestination(this.slug);
        },

        beforeRouteUpdate(to, from, next) {
            this.getHolidayDestination(to.params.slug)

            next();
        },

        methods: {
            getHolidayDestination(slug) {
                axios
                    .get(`/api/holiday-destinations/${slug}`)
                    .then((response) => {
                        this.destination = { ...this.destination, ...response.data.data } //data on component

                        this.$store.commit({
                            type: 'updateDestinations',
                            destination: response.data.data
                        });
                    })
                    .catch((error) => {
                        console.log(error, 'ERROR');
                    });
            }
        }
    }
</script>
