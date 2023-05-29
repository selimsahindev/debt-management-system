<template>
    <Navbar />
    <Sidebar v-if="page.props.user" />

    <main class="pt-[100px]">
        <slot />
    </main>

    <FlashMessageCard />
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar.vue';
import Sidebar from '@/Components/Sidebar.vue';
import FlashMessageCard from '../Components/FlashMessageCard.vue';

const page = usePage();
</script>
