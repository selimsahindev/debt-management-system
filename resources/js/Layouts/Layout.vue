<template>
    <main>
        <slot />
    </main>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';

const page = usePage();
console.log("Layout: " + page.props.flash.message);
</script>
