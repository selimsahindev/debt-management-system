<template>
    <nav>
        <div class="flex justify-between items-center h-[100px] px-10">
            <Link href="/">
            <h1 class="text-slate-600 font-bold text-xl">BORÇ TAKİP</h1>
            </Link>

            <div v-if="!page.props.user" class="flex flex-row gap-2">
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

            <div v-if="page.props.user">
                <Link href="/logout">
                <h1 class="rounded-full text-slate-100 bg-slate-500 tracking-tight text-md shadow-md px-4 py-1">
                    Çıkış Yap
                </h1>
                </Link>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

console.log(page.props.flash.message);
console.log(page.props.user);

if (page.props.flash.message) {
    alert(page.props.flash.message);
}
</script>
