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
                <h1 class="text-xl font-bold text-slate-500">BORÇ EKLE</h1>
            </div>

            <form @submit.prevent="createDebt">
                <div class="grid grid-cols-6 gap-5 items-center justify-center px-4 py-5 rounded-xl bg-slate-100 shadow">
                    <input class="rounded-lg shadow px-5 py-2 w-full col-span-6" type="text" v-model="form.customer"
                        placeholder="Borç Sahibi" required />
                    <input class="rounded-lg shadow px-5 py-2 w-full col-span-6" type="number" v-model="form.amount"
                        placeholder="0 TL" />
                    <input class="rounded-lg shadow px-5 py-2 w-full col-span-3" type="date" v-model="form.dueDate"
                        placeholder="Son Ödeme Tarihi" />

                    <div class="flex items-center ml-4 col-span-2">
                        <input checked id="isPaid" type="checkbox" v-model="form.isPaid"
                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="isPaid" class="ml-2 font-medium text-slate-500">Ödendi</label>
                    </div>

                    <input class="h-24 rounded-lg shadow px-5 py-2 w-full col-span-6" type="text" v-model="form.description"
                        placeholder="Açıklama" required />
                </div>
                <div class="flex flex-row justify-end mr-4 mt-6 mb-2">
                    <input
                        class="w-24 hover:cursor-pointer rounded-lg text-lg text-white text-center bg-green-500 hover:bg-green-400 transition duration-100 shadow px-4 py-1"
                        type="submit" value="Ekle" />
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    customer: null,
    description: '',
    amount: null,
    dueDate: new Date().toISOString().slice(0, 10),
    isPaid: false,
});

const createDebt = () => {
    form.post('/customers');
};
</script>
