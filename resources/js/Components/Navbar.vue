<template>
    <nav>
        <div class="flex justify-between items-center h-[100px] px-10">
            <h1 class="font-semibold tracking-tight text-xl text-slate-800">BORÇ TAKİP SİSTEMİ</h1>
            <div class="flex flex-row gap-2">
                <Link href="/register">
                <h1 class="rounded-full text-slate-600 bg-gray-50 tracking-tight text-md shadow-md px-4 py-1">Kayıt
                    Ol
                </h1>
                </Link>
                <Link href="/login">
                <h1 class="rounded-full text-slate-100 bg-slate-500 tracking-tight text-md shadow-md px-4 py-1">
                    Giriş
                </h1>
                </Link>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
