<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'
import Sidebar from '@/Components/Sidebar.vue'
import Button from '@/Components/Button.vue'
import { FolderIcon, FolderPlusIcon, PlusIcon, InformationCircleIcon, PaperAirplaneIcon, PencilIcon, CalendarIcon, ChevronUpDownIcon, CheckIcon, DocumentCheckIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
    folders: Array,
    folderId: Number,
    task: Object,
    statuses: Object,
    errors: Object
})

const title = ref(props.task.title)
const dueDate = ref(props.task.due_date)
const status = ref(props.task.status)

const updateTask = () => {
    router.post(`/folders/${props.folderId}/tasks/${props.task.id}/edit`, {
        title: title.value,
        due_date: dueDate.value,
        status: status.value
    })
}
</script>

<template>
    <Header/>
    <div class="grid grid-cols-5">
        <Sidebar class="col-start-1 col-span-1 row-start-1 row-span-2" :folders="folders" :folderId="folderId"/>
        <div class="mt-5 col-start-3 col-span-2 row-start-1 row-span-1 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form @submit.prevent="updateTask" class="space-y-6">
                <h5 class="text-xl font-medium text-gray-900 ">Edit Task</h5>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                        <PencilIcon class="w-5 h-5" />
                    </span>
                    <input v-model="title" type="text" name="title" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5">
                </div>

                <div v-if="errors.title" class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <InformationCircleIcon class="w-5 h-5 text-red-500" />
                    <div>
                        <span class="font-medium">Error! </span>{{ errors.title }}
                    </div>
                </div>

                <div class="flex">
                    <!-- <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Select an option</label> -->
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                        <CheckIcon class="w-5 h-5" />
                    </span>
                    <select id="status" v-model="status" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5">
                        <option v-for="(_status, key) in statuses" :key="key" :value="key">{{ _status.label }}</option>
                    </select>
                </div>


                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                        <CalendarIcon class="w-5 h-5" />
                    </span>
                    <input v-model="dueDate" type="date" name="due_date" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5">
                </div>

                <div class="flex justify-end">
                    <Button type="submit"><PaperAirplaneIcon class="w-5 h-5" /></Button>
                </div>
            </form>
        </div>
    </div>
</template>



