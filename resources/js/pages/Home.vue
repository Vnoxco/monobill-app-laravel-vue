<script setup>
import {onMounted} from "vue";
import MonoBill from "monopass";
import MbRouterLink from "../components/MbRouterLink.vue";

onMounted(() => {
   MonoBill.alert('success', 'Hello world!');
});

</script>

<template>
    <h2>Hello world!</h2>
    <mb-router-link to="/example">Navigate -></mb-router-link>
</template>

<style scoped>

</style>
