<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    version: {
        type: String,
        default: "0.0"
    },
    greet: String,
})
</script>
<template>
    <div>
        <h1>This is Homepage and the version is {{ version }}</h1>
        <p>{{greet}}</p>

        <Link href="/about">Go to About</Link>
    </div>
</template>
<style scoped></style>
