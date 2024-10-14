<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import { CalendarIcon } from '@heroicons/vue/24/outline'

onMounted(() => {
    initFlowbite()
})
</script>

<template>
    <div class="relative max-w-sm">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            <CalendarIcon class="w-5 h-5 text-gray-500 dark:text-gray-400" />
        </div>
        <input datepicker id="default-datepicker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  " placeholder="Select date">
    </div>
</template>