<script setup>
import { Link, router } from '@inertiajs/vue3';

function logout() {
    router.post('/logout')
}
</script>
<template>
    <nav class="bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- Logo / App Name -->
                <div class="flex items-center">
                    <Link href="/tasks"
                        class="text-2xl font-bold text-indigo-600 hover:text-indigo-700 transition duration-200">
                        Task App
                    </Link>
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-4">
                    <template v-if="$page.props.auth?.user">
                        <!-- Welcome Text -->
                        <span class="text-gray-700 font-medium">
                            Hello,
                            <span class="text-indigo-600 font-semibold">
                                {{ $page.props.auth.user.name }}
                            </span>
                        </span>

                        <!-- Logout Button -->
                        <button @click="logout"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition duration-200">
                            Logout
                        </button>
                    </template>

                    <template v-else>
                        <!-- Login Link -->
                        <Link href="/login"
                            class="px-4 py-2 text-gray-700 font-medium hover:text-indigo-600 transition duration-200">
                            Log In
                        </Link>

                        <!-- Register Link -->
                        <Link href="/register"
                            class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg shadow hover:bg-indigo-700 transition duration-200">
                            Register
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>
<style scoped></style>
