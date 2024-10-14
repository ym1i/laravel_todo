<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'
import Sidebar from '@/Components/Sidebar.vue'
import Button from '@/Components/Button.vue';
import { FolderIcon, FolderPlusIcon, PlusIcon, InformationCircleIcon, PaperAirplaneIcon, TrashIcon, ArrowLeftCircleIcon } from '@heroicons/vue/24/outline'

const props =defineProps({
    folders: Array,
    folder: Object,
    errors: Object
})

const deleteFolder = () => {
    router.post(`/folders/${props.folder.id}/delete`)
}

const handleClick = () => {
    router.get(`/folders/${props.folder.id}/tasks`)
}
</script>

<template>
    <Header/>
    <div class="grid grid-cols-5">
        <Sidebar class="col-start-1 col-span-1 row-start-1 row-span-2" :folders="folders" :folderId="folderId"/>
        <div class="mt-5 col-start-3 col-span-2 row-start-1 row-span-1 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form @submit.prevent="deleteFolder" class="space-y-6">
                <h5 class="text-xl font-medium text-gray-900 ">Delete Folder</h5>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                        <FolderIcon class="w-5 h-5" />
                    </span>
                    <input disabled type="text" name="title" :value="folder.title" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5">
                </div>

                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <InformationCircleIcon class="flex-shrink-0 inline w-4 h-4 me-3" />
                    <div>このフォルダーを削除しますか？</div>
                </div>

                <div class="flex gap-2 justify-between">
                    <Button type="button" outlined color="transparent" @click="handleClick"><ArrowLeftCircleIcon class="w-5 h-5" /></Button>
                    <Button type="submit" outlined color="transparent"><TrashIcon class="w-5 h-5" /></Button>
                </div>
            </form>
        </div>
    </div>
</template>



