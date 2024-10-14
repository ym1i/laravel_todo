<script setup>
import { Link } from '@inertiajs/vue3'
import { FolderIcon, FolderPlusIcon, PencilSquareIcon, TrashIcon, Cog6ToothIcon, Bars2Icon } from '@heroicons/vue/24/outline'
import { FolderOpenIcon } from '@heroicons/vue/24/solid'

const props = defineProps({
    folders: Array,
    folderId: Number
})

const isCurrent = (id) => {
    return id === props.folderId
}
</script>

<template>
    <div class="container max-w-72 h-screen  bg-zinc-300">
        <div class="flex flex-col gap-5 pb-4 pl-6 pr-6 overflow-y-auto">
            <div class="flex items-center">
                <img src="" alt="" />
            </div>

            <nav class="flex flex-col">
                <ul class="flex flex-col gap-7">
                    <li></li>
                    <li>
                        <div class="flex items-center text-sm font-semibold mb-4">
                            Folders
                            <Link :href="route('folders.create')" class="ml-auto">
                                <FolderPlusIcon class="w-6 h-6" />
                            </Link>
                        </div>
                        <ul>
                            <li v-for="folder in folders">
                                <Link :href="route('tasks.index', {id: folder.id})" :class="folderId === folder.id ? 'active' : 'list-item'">
                                    <FolderIcon v-if="!isCurrent(folder.id)" class="w-5 h-5" />
                                    <FolderOpenIcon v-if="isCurrent(folder.id)" class="w-6 h-6" />
                                    {{ folder.title }}
                                    <span class="flex gap-3 ml-auto">
                                        <Link :href="route('folders.edit', {id: folder.id})">
                                            <PencilSquareIcon class="w-5 h-5" />
                                        </Link>
                                        <Link :href="route('folders.delete', {id: folder.id})">
                                            <TrashIcon class="w-5 h-5" />
                                        </Link>
                                    </span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="flex gap-3 items-center mt-auto p-2"><Cog6ToothIcon class="w-5 h-5" />Setting</li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<style>
ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.list-item {
    display: flex;
    column-gap: 0.75rem;
    padding: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    line-height: 1.5rem;
    text-decoration: none;
}

.active {
    background-color: rgb(161 161 170);
    color: white;
    display: flex;
    column-gap: 0.75rem;
    padding: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    line-height: 1.5rem;
    text-decoration: none;
    border-radius: 0.5rem;
}
</style>