<script setup>
import { Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    email: '',
    password: '',
    remember: false,
})

function submit() {
    form.post('/login')
}
</script>
<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-md bg-white shadow-2xl rounded-3xl p-8 border border-gray-100">

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>

                    <input id="email" v-model="form.email" type="email" name="email" autocomplete="username"
                        placeholder="you@example.com" class="w-full px-4 py-3 rounded-xl border bg-gray-50 text-gray-800
                   placeholder-gray-400 shadow-sm transition duration-200
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" :class="form.errors.email
                    ? 'border-red-400 focus:ring-red-500 focus:border-red-500'
                    : 'border-gray-300'">

                    <span v-if="form.errors.email" class="mt-2 block text-sm font-medium text-red-600">
                        {{ form.errors.email }}
                    </span>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>

                    <input id="password" v-model="form.password" type="password" name="password"
                        autocomplete="current-password" placeholder="Enter your password" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50
                   text-gray-800 placeholder-gray-400 shadow-sm transition duration-200
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" :class="form.errors.password
                    ? 'border-red-400 focus:ring-red-500 focus:border-red-500'
                    : 'border-gray-300'">

                    <span v-if="form.errors.password" class="mt-2 block text-sm font-medium text-red-600">
                        {{ form.errors.password }}
                    </span>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-3 cursor-pointer select-none">
                        <input v-model="form.remember" type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-blue-600
                           focus:ring-blue-500">
                        <span class="text-sm text-gray-600">Remember me</span>
                    </label>

                    <Link href="/forgot-password" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                        Forgot Password?
                    </Link>
                </div>

                <!-- Submit Button -->
                <button type="submit" :disabled="form.processing" class="w-full flex items-center justify-center gap-2
               bg-gradient-to-r from-blue-600 to-indigo-600
               hover:from-blue-700 hover:to-indigo-700
               text-white font-semibold py-3 px-4 rounded-xl
               shadow-lg transition duration-300
               focus:outline-none focus:ring-4 focus:ring-blue-300
               disabled:opacity-70 disabled:cursor-not-allowed">
                    <svg v-if="form.processing" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                    </svg>

                    {{ form.processing ? 'Logging in...' : 'Log In' }}
                </button>
            </form>

            <div class="mt-6 text-center">
                <Link href="/register" class="text-sm font-medium text-blue-600 hover:text-blue-700 transition">
                    ← Sing Up
                </Link>
            </div>

        </div>

    </div>

</template>
<style scoped></style>
