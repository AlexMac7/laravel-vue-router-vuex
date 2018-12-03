<template>
    <div>
        <h1>Vue Router Demo App</h1>

        <ul>
            <li>
                <router-link :to="{ name: 'home' }">Home</router-link>
            </li>
            <li v-for="destination in holidayDestinations">
                <router-link v-bind="destination" :to="{ name: 'holidayDestinations', params: { slug: destination.slug }}">
                    {{ destination.name }}
                </router-link>
            </li>
        </ul>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            holidayDestinations: {
                type: Array,
                required: true
            }
        }
    }
</script>