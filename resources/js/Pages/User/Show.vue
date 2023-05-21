<template>
    <Head title="Welcome" />

    <div>
        <h1>Welcome</h1>
        <p>Hello {{ user.firstName + ' ' + user.lastName }}, welcome to your first Inertia app!</p>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';

const { user } = usePage().props;
</script>
