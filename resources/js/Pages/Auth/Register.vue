<template>
    <Layout>

        <Head title="Register" />

        <nav>
            <div class="flex justify-between items-center h-[100px] px-10">
                <h1 class="font-semibold tracking-tight text-xl text-slate-800">BORÇ TAKİP SİSTEMİ</h1>
                <div class="flex flex-row gap-2">
                    <a href="/register">
                        <h1 class="rounded-full text-slate-600 bg-gray-50 tracking-tight text-md shadow-md px-4 py-1">Kayıt
                            Ol
                        </h1>
                    </a>
                    <a href="/login">
                        <h1 class="rounded-full text-slate-100 bg-slate-500 tracking-tight text-md shadow-md px-4 py-1">
                            Giriş
                        </h1>
                    </a>
                </div>
            </div>
        </nav>

        <v-parallax src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-parallax>

        <div class="flex items-center justify-center min-h-screen bg-gray-100 w-full">
            <div class="px-6 py-8 bg-white rounded-md shadow-md w-full max-w-xl">
                <h2 class="mb-4 text-2xl font-bold text-center">Register</h2>
                <form @submit.prevent="registerUser">
                    <div class="mb-4">
                        <label for="firstName" class="block mb-2 text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="firstName" v-model="lastName"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="lastName" class="block mb-2 text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="lastName" v-model="firstName"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" v-model="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" v-model="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="confirm-password" v-model="confirmPassword"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Kayıt
                            Ol</button>
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
        const firstName = ref('');
        const lastName = ref('');
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
