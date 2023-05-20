<template>
    <Layout>

        <Head title="Welcome" />

        <div>
            <h1>Welcome</h1>
            <p>Hello {{ user.name }}, welcome to your first Inertia app!</p>
        </div>

    </Layout>
</template>

<script setup>
import Layout from '../../Layouts/Layout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({ user: { Object } })
</script>
