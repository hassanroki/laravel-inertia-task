<script setup>
import { useForm } from '@inertiajs/vue3';
import Navbar from '../../Components/Navbar.vue';

const otpForm = useForm({
    otp: ''
})

const resentForm = useForm({})

function submitOtp() {
    otpForm.post('/verify-email')
}

function resendOtp() {
    resentForm.post('/verify-email/resend')
}
</script>
<template>
    <Navbar />
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 text-center">
            <!-- Title -->
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Verify Your Email
            </h1>

            <!-- Subtitle -->
            <p class="text-gray-500 text-sm leading-6 mb-8">
                We sent a 6-digit verification code to
                <span class="font-semibold text-gray-700">{{ $page.props.auth.user.email }}</span>
            </p>

            <p class="text-gray-500 text-sm leading-6 mb-8">
                <span class="font-semibold text-gray-700">{{ $page.props.flash.success }}</span>
            </p>

            <form @submit.prevent="submitOtp">
                <!-- OTP Input -->
                <input v-model="otpForm.otp" type="text" maxlength="6" placeholder="Enter 6-digit code"
                    class="w-full h-14 px-4 text-center text-2xl tracking-[0.5em] border-2 border-blue-500 rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-100 placeholder:text-gray-400" />
                <span v-if="otpForm.errors.otp" class="px-3 py-1 text-sm font-medium text-red-700">
                    {{ otpForm.errors.otp }}
                </span>

                <!-- Verify Button -->
                <button :disabled="resentForm.processing" type="submit"
                    class="mt-6 w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 rounded-lg transition duration-200">
                    {{ resentForm.processing ? 'Verifying...' : 'Verify' }}
                </button>

            </form>

            <!-- Resend -->
            <div class="mt-8 text-sm text-gray-500">
                <p>Didn't receive the code?</p>
                <button @click="resendOtp" :disabled="resentForm.processing" type="button"
                    class="mt-2 text-indigo-600 hover:text-indigo-700 font-semibold underline">
                    {{ resentForm.processing ? 'Sending...' : 'Resend Code' }}
                </button>
            </div>
        </div>
    </div>
</template>
<style scoped></style>
