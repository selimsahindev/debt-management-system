<template>
    <Navbar />

    <main class="pt-[100px]">
        <slot />
    </main>

    <FlashMessageCard />
</template>

<script setup>
import Navbar from '../Components/Navbar.vue';
import FlashMessageCard from '../Components/FlashMessageCard.vue';
</script>
