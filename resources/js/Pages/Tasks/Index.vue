<script setup>
import { Link, router } from '@inertiajs/vue3';

defineProps({
    tasks: {
        type: Array,
        default: () => [],
    },
})

// Delete task
function deleteTask(id) {
    if (confirm("Are you sure??")) {
        router.delete(`/tasks/${id}/delete`);
    }
}
</script>

<template>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8 flex justify-between">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">
                My Tasks
            </h1>
            <Link href="/tasks/create"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition duration-200">
                + Add New Task
            </Link>
        </div>

        <!-- Flash Message -->
        <p v-if="$page.props.flash?.success"
            class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800">
            {{ $page.props.flash.success }}
        </p>

        <!-- Empty State -->
        <div v-if="tasks.length === 0" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-10 text-center">
            <div class="text-5xl mb-4">📋</div>
            <h2 class="text-xl font-semibold text-gray-700">
                No Tasks Found
            </h2>
            <p class="text-gray-500 mt-2">
                You haven't added any tasks yet.
            </p>
        </div>

        <!-- Task Grid -->
        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="task in tasks" :key="task.id"
                class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-6">
                <!-- Status Badge -->
                <div class="flex justify-between items-start mb-4">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full" :class="task.completed
                        ? 'bg-green-100 text-green-700'
                        : 'bg-yellow-100 text-yellow-700'
                        ">
                        {{ task.completed ? 'Completed' : 'Pending' }}
                    </span>

                    <span class="rounded-lg shadow py-1 px-2 hover:bg-blue-700 hover:text-white text-sm text-gray-400">
                        <Link :href="`/tasks/${task.id}/edit`">Edit</Link>
                    </span>
                </div>

                <!-- Task Title -->
                <h2 class="text-lg font-bold mb-2" :class="task.completed
                    ? 'text-gray-400 line-through'
                    : 'text-gray-800'
                    ">
                    {{ task.title }}
                </h2>

                <!-- Description -->
                <p class="text-sm leading-relaxed" :class="task.completed
                    ? 'text-gray-400'
                    : 'text-gray-600'
                    ">
                    {{ task.description || 'No description provided.' }}
                </p>

                <!-- Footer -->
                <div class="mt-5 pt-4 border-t border-gray-100 flex items-center justify-between">
                    <!-- Task ID -->
                    <span class="text-xs text-gray-400">
                        Task ID: #{{ task.id }}
                    </span>

                    <!-- Right Side -->
                    <div class="flex items-center gap-3">
                        <!-- Status Indicator -->
                        <div class="flex items-center gap-2" :title="task.completed ? 'Completed' : 'Pending'">
                            <div class="w-3 h-3 rounded-full"
                                :class="task.completed ? 'bg-green-500' : 'bg-yellow-400'"></div>
                            <span class="text-xs font-medium"
                                :class="task.completed ? 'text-green-600' : 'text-yellow-600'">
                                {{ task.completed ? 'Completed' : 'Pending' }}
                            </span>
                        </div>

                        <!-- Delete Button -->
                        <button @click="deleteTask(task.id)" type="button"
                            class="text-white rounded-lg shadow py-1 px-2 hover:bg-red-700 hover:text-white"
                            title="Delete Task">
                            🗑️
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
body {
    background-color: #f9fafb;
}
</style>
