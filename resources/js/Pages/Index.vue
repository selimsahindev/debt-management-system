<template>
    <Navbar />

    <div
        class="flex items-center justify-center h-screen bg-fixed bg-center bg-cover bg-[url('https://cdn.vuetifyjs.com/images/parallax/material.jpg')]">
        <div class="text-2xl text-slate-800 rounded-xl h-full w-full">
            <div class="px-6 py-8 m-auto mt-10 bg-white rounded-md shadow-md max-w-lg">
                <h2 class="mb-8 text-2xl text-slate-600 font-bold text-center">Homepage</h2>
            </div>
        </div>

        <div v-if="page.props.flash.message"
            class="fixed right-8 bottom-5 px-12 py-1 text-lg rounded-lg w-max-lg bg-green-400 shadow-lg lowercase">
            {{ page.props.flash.message }}
        </div>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar.vue';

const page = usePage();
</script>

