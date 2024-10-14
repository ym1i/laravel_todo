<script setup>
import Button from './Button.vue'
import { Bars2Icon, PowerIcon } from '@heroicons/vue/24/outline'
</script>

<template>
    <div class="p-8 bg-slate-800">
        <div class="max-w-7xl mx-auto">
            <div class="md:flex md:items-center md:justify-start gap-4">
                <div class="w-10 h-10">
                    <img src="/images/MS_todo_icon.png" alt="">
                </div>
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-white">todo</h2>
                </div>
                <div class="flex gap-4 ml-auto">
                    <Button color="rgb(161 161 170)"><PowerIcon class="w-5 h-5" /></Button>
                    <Button color="rgb(161 161 170)"><Bars2Icon class="w-5 h-5" /></Button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>