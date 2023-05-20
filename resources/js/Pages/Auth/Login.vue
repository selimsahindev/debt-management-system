<template>
    <Layout>

        <Head title="Register" />

        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="max-w-md px-6 py-8 bg-white rounded-md shadow-md">
                <h2 class="mb-4 text-2xl font-bold text-center">Kayıt Ol</h2>
                <form @submit.prevent="registerUser">
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Ad</label>
                        <input type="text" id="name" v-model="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">E-posta</label>
                        <input type="email" id="email" v-model="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Şifre</label>
                        <input type="password" id="password" v-model="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-700">Şifre
                            Onayı</label>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Login</button>
                    </div>
                </form>
            </div>
        </div>

    </Layout>
</template>


<script>
import { ref } from 'vue';

export default {
    setup() {
        const name = ref('');
        const email = ref('');
        const password = ref('');
        const confirmPassword = ref('');

        const registerUser = () => {
            // Kayıt işlemi burada gerçekleştirilebilir
            // name, email, password, confirmPassword değerlerini kullanarak uygun işlemler yapılabilir

            // Örnek olarak, konsola kaydedilen kullanıcı bilgilerini yazdıralım
            console.log('Ad:', name.value);
            console.log('E-posta:', email.value);
            console.log('Şifre:', password.value);
            console.log('Şifre Onayı:', confirmPassword.value);

            // Kayıt işlemi tamamlandıktan sonra yönlendirme vb. yapılabilir
        };

        return {
            name,
            email,
            password,
            confirmPassword,
            registerUser
        };
    }
};
</script>
