<template>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <div class="p-4 sm:ml-64">
        <div class="flex flex-col p-4 mt-4 rounded-lg shadow">
            <div class="inline-flex items-center justify-between my-6">
                <h1 class="text-xl font-bold text-slate-500">MÜŞTERİLER</h1>
                <Link href="/customers/create">
                <div
                    class="rounded-lg text-white text-center bg-green-500 hover:bg-green-400 transition duration-200 shadow px-3 py-1">
                    Müşteri Ekle
                </div>
                </Link>
            </div>

            <div class="grid grid-cols-5 items-center justify-center py-2 px-10 rounded-t-xl bg-slate-300">
                <span class="col-span-2 font-semibold text-slate-500">Ad Soyad</span>
                <span class="col-span-1 font-semibold text-slate-500">ID</span>
            </div>

            <div class="flex flex-col gap-3 items-center justify-center p-4 rounded-b-xl bg-slate-100 shadow">
                <CustomerListElement v-for="customer in  customers " :customer="customer" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage, useForm } from '@inertiajs/vue3';
import CustomerListElement from '@/Components/CustomerListElement.vue';

const page = usePage();
const customers = page.props.customers;
</script>
