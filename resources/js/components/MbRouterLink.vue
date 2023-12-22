<script setup>
import MonoBill from "monopass";
import {useRouter} from "vue-router";

const router = useRouter();

const props = defineProps({
    to: String,
    class: String
});

function handleRoute() {
    MonoBill.router.push(props.to);
    router.push(props.to);
}

</script>

<template>
    <a :class="props.class" :href="props.to" @click.prevent="handleRoute">
        <slot></slot>
    </a>
</template>

<style scoped>

</style>
