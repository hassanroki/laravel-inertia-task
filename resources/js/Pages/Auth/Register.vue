<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

function submit() {
    form.post('/register')
}
</script>
<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-md bg-white shadow-2xl rounded-3xl p-8 border border-gray-100">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Create an Account</h1>
            </div>

            <!-- Login Link -->
            <div class="text-center mb-6">
                <Link href="/login" class="text-sm text-blue-600 hover:text-blue-700 font-medium transition duration-200">
                    Already have an account? Log in
                </Link>
            </div>

            <!-- Form -->
            <form class="space-y-5" @submit.prevent="submit">

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input v-model="form.name" type="text" id="name" placeholder="Your full name" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           transition duration-200">
                    <span v-if="form.errors.name" class="px-3 py-1 text-sm font-medium text-red-700">
                        {{ form.errors.name }}
                    </span>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input v-model="form.email" type="email" autocomplete="username" id="email" placeholder="Enter your email" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           transition duration-200">
                    <span v-if="form.errors.email" class="px-3 py-1 text-sm font-medium text-red-700">
                        {{ form.errors.email }}
                    </span>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input v-model="form.password" type="password" id="password" autocomplete="new-password" placeholder="Enter your password"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           transition duration-200">
                    <span v-if="form.errors.password" class="px-3 py-1 text-sm font-medium text-red-700">
                        {{ form.errors.password }}
                    </span>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirmPassword" class="block text-sm font-semibold text-gray-700 mb-2">
                        Confirm Password <span class="text-red-500">*</span>
                    </label>
                    <input v-model="form.password_confirmation" type="password" autocomplete="new-password" id="confirmPassword"
                        placeholder="Re-type your password" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           transition duration-200">
                </div>

                <!-- Submit Button -->
                <button :disabled="form.processing" type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white
                       py-3 rounded-xl font-semibold shadow-lg
                       hover:from-blue-700 hover:to-indigo-700
                       focus:outline-none focus:ring-4 focus:ring-blue-300
                       transform hover:-translate-y-0.5 transition duration-300">
                    {{ form.processing ? 'Creating account...' : 'Register' }}
                </button>
            </form>
        </div>
    </div>

</template>
<style scoped></style>
