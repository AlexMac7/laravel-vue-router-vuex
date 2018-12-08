<template>
    <div>
        <div>
            <b-nav>
                <b-nav-item active>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </b-nav-item>
                <b-nav-item v-for="destination in holidayDestinations" :key="destination.id">
                    <router-link v-bind="destination" :to="{ name: 'holidayDestinations', params: { slug: destination.slug }}">
                        {{ destination.name }}
                    </router-link>
                </b-nav-item>
            </b-nav>
        </div>

        <b-container fluid>
            <router-view></router-view>
        </b-container>
    </div>
</template>
<script>
    export default {
        //todo, get an store all destinations here, so when a new one is added the nav bar is updated
        props: {
            holidayDestinations: {
                type: Array,
                required: true
            }
        }
    }
</script>