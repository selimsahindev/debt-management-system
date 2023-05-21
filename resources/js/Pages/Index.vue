<template>
    <Navbar />

    <div
        class="flex items-center justify-center h-screen bg-fixed bg-center bg-cover bg-[url('https://cdn.vuetifyjs.com/images/parallax/material.jpg')]">
        <div class="text-2xl text-slate-800 rounded-xl h-full w-full">
            <div class="px-6 py-8 m-auto mt-10 bg-white rounded-md shadow-md max-w-lg">
                <h2 class="mb-8 text-2xl text-slate-600 font-bold text-center">Homepage</h2>
            </div>
        </div>
    </div>
</template>

<script setup>
import Navbar from '../Components/Navbar.vue';
</script>

