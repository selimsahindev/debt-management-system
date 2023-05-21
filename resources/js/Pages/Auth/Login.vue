<template>
    <Navbar />

    <div
        class="flex items-center justify-center h-screen bg-fixed bg-center bg-cover bg-[url('https://cdn.vuetifyjs.com/images/parallax/material.jpg')]">
        <div class="text-2xl text-slate-800 rounded-xl h-full w-full">
            <div class="px-6 py-8 m-auto mt-10 bg-white rounded-md shadow-md max-w-lg">
                <h2 class="mb-8 text-2xl text-slate-600 font-bold text-center">Giriş Yap</h2>
                <form @submit.prevent="login">
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" v-model="form.email"
                            class="w-full px-3 py-2 border border-gray-400 rounded-md text-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Parola</label>
                        <input type="password" id="password" v-model="form.password"
                            class="w-full px-3 py-2 border border-gray-400 rounded-md text-lg" required>
                    </div>

                    <div>
                        <label class="text-lg font-normal text-gray-700 flex items-center gap-3">
                            <input class="w-4 h-4" type="checkbox" v-model="form.rememberMe">
                            Beni Hatırla
                        </label>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full mt-5 text-lg px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Giriş</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>


<script setup>
import { useForm } from '@inertiajs/vue3';
import Navbar from '../../Components/Navbar.vue';

const form = useForm({
    email: null,
    password: null,
    rememberMe: false,
});

const login = () => form.post('/login');
</script>
