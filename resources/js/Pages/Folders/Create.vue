<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'
import Sidebar from '@/Components/Sidebar.vue'
import Button from '@/Components/Button.vue';
import { FolderIcon, FolderPlusIcon, PlusIcon, InformationCircleIcon, PaperAirplaneIcon } from '@heroicons/vue/24/outline'

const props =defineProps({
    folders: Array,
    errors: Object 
})

const title = ref('')

const storeFolder = () => {
    router.post('/folders/create', { title: title.value })
}

// q: color: red; をTailwindCSSで記述すると？
// a: 
</script>

<template>
    <Header/>
    <div class="grid grid-cols-5">
        <Sidebar class="col-start-1 col-span-1 row-start-1 row-span-2" :folders="folders" folderId="0"/>
        <div class="mt-5 col-start-3 col-span-2 row-start-1 row-span-1 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form @submit.prevent="storeFolder" class="space-y-6">
                <h5 class="text-xl font-medium text-gray-900 ">Create Folder</h5>
                <!-- <label for="folder" class="block mb-2 text-sm font-medium text-gray-900 ">Folder</label> -->
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                        <FolderIcon class="w-5 h-5" />
                    </span>
                    <input v-model="title" type="text" name="title" placeholder="New Folder" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5">
                </div>
                
                <div v-if="errors.title" class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <InformationCircleIcon class="w-5 h-5 text-red-500" />
                    <div>
                        <span class="font-medium">Error! </span>{{ errors.title }}
                    </div>
                </div>

                <div class="flex justify-end">
                    <Button type="submit"><PaperAirplaneIcon class="w-5 h-5" /></Button>
                </div>
            </form>
        </div>
    </div>
</template>



