<script setup>
import { Link } from '@inertiajs/vue3'
import NoTaskToast from './NoTaskToast.vue'
import Button from './Button.vue'
import { PlusCircleIcon, PencilSquareIcon, TrashIcon, CheckIcon, DocumentCheckIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
    tasks: Array,
    folderId: Number
})

const getStatusText = (status) => {
    switch (status) {
        case 1:
            return "未着手";
        case 2:
            return "進行中";
        case 3:
            return "完了";
        default:
            return "不明";
      }
}

const getStatusStyle = (status) => {
    switch (status) {
        case 1:
            return "not-started";
        case 2:
            return "in-progress";
        case 3:
            return "completed";
        default:
            return "unknown";
    }
}
</script>

<template>
    <div class="mt-4 pt-10 pb-10 bg-white border border-gray-300 rounded-lg">
        <div class="max-w-7xl mx-auto">
            <div class="pl-4 pr-4 lg:pl-8 lg:pr-8 sm:pl-6 sm:pr-6">
                <div class="flex items-center">
                    <div class="flex-auto">
                        <h1 class="text-base font-semibold text-gray-900">Tasks</h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-14">
                        <Link :href="route('tasks.create', {id: props.folderId})">
                            <Button outlined color="transparent"><PlusCircleIcon class="w-5 h-5" /></Button>
                        </Link>
                    </div>
                </div>
                <div class="mt-8">
                    <!-- <div class="-ml-4 -mr-4 sm:-ml-5 sm:-mr-5 lg:-ml-8 lg:-mr-8 -mt-2 -mb-2 overflow-x-auto "> -->
                    <div class="-mt-2 -mb-2 overflow-x-auto ">
                        <div class="min-w-full align-middle sm:ml-6 sm:mr-6 lg:ml-8 lg:mr-8 pt-1 pb-1">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Due</th>
                                        <th class="sr-only">edit</th>
                                        <th class="sr-only">delete</th>
                                    </tr>
                                </thead>
                                <tbody class="border-t border-b border-gray-300">
                                    <tr v-for="task in tasks">
                                        <td>
                                            <div class="flex items-center">
                                                <div class="flex w-10 h-10 shrink-0">
                                                    <DocumentCheckIcon class="self-center w-5 h-5" />
                                                </div>
                                                <div class="ml-4">
                                                    {{ task.title }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span :class="getStatusStyle(task.status)">
                                                {{ getStatusText(task.status) }}
                                            </span>
                                        </td>
                                        <td>{{ task.due_date }}</td>
                                        <Link :href="route('tasks.edit', { id: props.folderId, task_id: task.id})">
                                            <td><Button outlined color="transparent"><PencilSquareIcon class="w-5 h-5" /></Button></td>
                                        </Link>
                                        <Link :href="route('tasks.delete', { id: props.folderId, task_id: task.id})">
                                            <td><Button outlined color="transparent"><TrashIcon class="w-5 h-5" /></Button></td>
                                        </Link>
                                    </tr>
                                </tbody>
                            </table>
                            <div v-if="tasks.length === 0" class="flex items-center justify-center">
                                <NoTaskToast />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
table {
    text-indent: 0;
    border-color: inherit;
    border-collapse: collapse;
}

th {
    text-align: left;
    font-size: 0.75rem;
    font-weight: 600;
    line-height: 1.25rem;
    padding-top: 0.875rem;
    padding-bottom: 0.875rem;
    padding-right: 0.75rem;
    padding-left: 1rem;
    color: rgb(17 24 39);
}

td {
    font-size: 0.875rem;
    line-height: 1.25rem;
    padding-top: 1.25rem;
    padding-bottom: 1.25rem;
    padding-right: 0.75rem;
    padding-left: 1rem;
    white-space: nowrap;
}

.not-started {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    line-height: 1.25rem;
    color: rgb(239 68 68);
    background-color: rgb(254 226 226);
    border-radius: 0.375rem;
    border: 1px solid rgb(239 68 68);
    display: inline-flex;
    align-items: center;
}

.in-progress {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    line-height: 1.25rem;
    color: rgb(249 115 22);
    background-color: rgb(254 240 138);
    border-radius: 0.375rem;
    border: 1px solid rgb(249 115 22);
    display: inline-flex;
    align-items: center;
}

.completed {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    line-height: 1.25rem;
    color: rgb(34 197 94);
    background-color: rgb(220 252 231);
    border-radius: 0.375rem;
    border: 1px solid rgb(34 197 94);
    display: inline-flex;
    align-items: center;
}

.unknown {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    line-height: 1.25rem;
    color: rgb(34 197 94);
    background-color: rgb(220 252 231);
    border-radius: 0.375rem;
    border: 1px solid rgb(34 197 94);
    display: inline-flex;
    align-items: center;
}

@media (min-width: 640px) {
    th {
        padding-left: 0px;
    }

    td {
        padding-left: 0px;
    }
}
</style>
