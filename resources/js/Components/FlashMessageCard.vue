<template>
    <div v-if="page.props.flash.message"
        class="fixed right-8 bottom-5 px-12 py-1 text-lg rounded-lg w-max-lg bg-green-400 shadow-lg lowercase">
        {{ page.props.flash.message }}
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
const page = usePage();
</script>
