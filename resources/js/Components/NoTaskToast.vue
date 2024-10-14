<script setup>
import { FolderIcon, FolderPlusIcon, PencilSquareIcon, TrashIcon, Cog6ToothIcon, Bars2Icon, PlusCircleIcon, XCircleIcon } from '@heroicons/vue/24/outline'
</script>

<template>
<div id="toast-warning" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-zinc-100 rounded-lg shadow" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-slate-800 rounded-lg">
        <FolderIcon class="w-5 h-5" />
    </div>
    <div class="ms-3 text-sm font-normal">No Tasks Available</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-warning" aria-label="Close">
        <XCircleIcon class="w-3 h-3" />
    </button>
</div>
</template>