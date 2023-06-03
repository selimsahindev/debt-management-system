<template>
    <div class="grid grid-cols-5 items-center h-12 w-full rounded bg-gray-200 hover:bg-gray-300 shadow px-6">
        <p class="col-span-2 text-md text-gray-500">{{ customer.firstName + ' ' + customer.lastName }}</p>
        <p class="col-span-2 text-md text-gray-500">{{ customer.id }}</p>
        <div class="col-span-1 flex flex-row gap-5 items-center justify-end pt-1">
            <Link :href="`customers/${customer.id}/edit`">
            <div class="inline-flex gap-1 items-center text-orange-400 hover:underline">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.067 2.272a3.568 3.568 0 0 1 3.888 5.818l-.518.518-5.045-5.045.518-.518a3.568 3.568 0 0 1 1.157-.773ZM13.977 4.977 3.655 15.3a1 1 0 0 0-.258.444l-1.362 4.993a1 1 0 0 0 1.228 1.228l4.993-1.362a1 1 0 0 0 .444-.258l10.323-10.322-5.046-5.046Z" />
                </svg>
                <p class="font-semibold">Düzenle</p>
            </div>
            </Link>

            <button @click="deleteCustomer(customer.id)">
                <div class="inline-flex gap-1 items-center text-red-600 hover:text-red-500 hover:underline">
                    <svg class="w-4 h-4 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12.663 1.5h-1.326c-1.069 0-1.49.09-1.921.27a2.689 2.689 0 0 0-1.084.82c-.292.365-.493.746-.784 1.774L7.368 5H5a1 1 0 0 0 0 2h.563l.703 11.25c.082 1.32.123 1.98.407 2.481a2.5 2.5 0 0 0 1.083 1.017C8.273 22 8.935 22 10.258 22h3.484c1.323 0 1.985 0 2.502-.252a2.5 2.5 0 0 0 1.083-1.017c.284-.5.325-1.16.407-2.482L18.437 7H19a1 1 0 1 0 0-2h-2.367l-.18-.636c-.292-1.028-.493-1.409-.785-1.775a2.694 2.694 0 0 0-1.084-.819c-.431-.18-.852-.27-1.92-.27zm1.89 3.5-.025-.09c-.203-.717-.29-.905-.424-1.074a.696.696 0 0 0-.292-.221c-.2-.084-.404-.115-1.149-.115h-1.326c-.745 0-.95.031-1.149.115a.696.696 0 0 0-.292.221c-.135.169-.221.357-.424 1.074L9.446 5h5.108zM9.61 8.506a.75.75 0 0 0-.724.776l.297 8.495a.75.75 0 0 0 1.499-.053l-.297-8.494a.75.75 0 0 0-.775-.724zm4.008.724a.75.75 0 0 1 1.499.052l-.297 8.495a.75.75 0 0 1-1.499-.053l.297-8.494z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="font-semibold">Sil</p>
                </div>
            </button>
        </div>
    </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';

defineProps({
    customer: Object,
    required: true
});

const deleteCustomer = (id) => {
    if (confirm('Müşteriyi silmek istediğinize emin misiniz?')) {
        router.delete(`/customers/${id}`);
    }
};
</script>
