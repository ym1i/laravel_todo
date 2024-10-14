<script setup>
import { Link } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'
import Sidebar from '@/Components/Sidebar.vue'
import TaskList from '@/Components/TaskList.vue'

const props =defineProps({
    folders: Array,
    folderId: Number,
    tasks: Array
})

console.log('tasks: ', props.tasks)
</script>

<template>
    <Header/>
    <div class="grid grid-cols-5">
        <Sidebar class="col-start-1 col-span-1 row-start-1 row-span-2" :folders="folders" :folderId="folderId"/>
        <TaskList class="col-start-2 col-span-3 row-start-1 row-span-1" :tasks="tasks" :folderId="folderId"/>
    </div>
</template>

<style scoped>
</style>