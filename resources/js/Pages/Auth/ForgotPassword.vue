<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
})

function submit() {
    form.post('/forgot-password')
}
</script>
<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-md bg-white shadow-2xl rounded-3xl p-8 border border-gray-100">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">
                    Forgot Password
                </h1>
            </div>

            <!-- Success Message -->
            <div v-if="$page.props.flash?.success"
                class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ $page.props.flash.success }}
            </div>

            <!-- Form -->
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

                <!-- Submit Button -->
                <button type="submit" :disabled="form.processing" class="w-full flex items-center justify-center gap-2
                           bg-gradient-to-r from-blue-600 to-indigo-600
                           hover:from-blue-700 hover:to-indigo-700
                           text-white font-semibold py-3 px-4 rounded-xl
                           shadow-lg transition duration-300
                           focus:outline-none focus:ring-4 focus:ring-blue-300
                           disabled:opacity-70 disabled:cursor-not-allowed">

                    {{
                        form.processing
                            ? 'Sending...'
                            : 'Send Reset Link'
                    }}
                </button>
            </form>

            <!-- Back to Login -->
            <div class="mt-6 text-center">
                <Link href="/login" class="text-sm font-medium text-blue-600 hover:text-blue-700 transition">
                    ← Back to Login
                </Link>
            </div>
        </div>
    </div>
</template>
<style scoped></style>
