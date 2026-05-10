<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    description: '',
})

function submit() {
    form.post('/tasks/store')
}
</script>
<template>
    <div class="min-h-screen bg-gray-100 py-10 px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Card -->
            <div class="bg-white shadow-lg rounded-2xl p-8 border border-gray-200">
                <!-- Header -->
                <div class="mb-8 flex justify-between">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800">
                        New Task Create
                    </h1>
                    <Link href="/tasks"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        Back
                    </Link>
                </div>

                <!-- Form -->
                <form class="space-y-6" @submit.prevent="submit">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Title
                        </label>
                        <input v-model="form.title" type="text" id="title" placeholder="Enter task title"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" />
                        <span v-if="form.errors.title" class="px-3 py-1 text-sm font-medium text-red-700">
                            {{ form.errors.title }}
                        </span>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea v-model="form.description" id="description" rows="5"
                            placeholder="Enter task description"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"></textarea>
                        <span v-if="form.errors.description" class="px-3 py-1 text-sm font-medium text-red-700">
                            {{ form.errors.description }}
                        </span>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-md transition duration-300">
                            Add New Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
