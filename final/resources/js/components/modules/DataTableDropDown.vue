<script setup lang="ts">
import { MoreHorizontal } from 'lucide-vue-next'
import { Button } from '@/components/ui/button'
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from '@/components/ui/dropdown-menu'
import { Module } from './ModulesTable.vue';

defineProps<{
    module: Module
}>()

function copy(id: string) {
    navigator.clipboard.writeText(id)
}
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button variant="ghost" class="w-8 h-8 p-0">
                <Button class="">Open menu</Button>
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end">
            <DropdownMenuLabel>Actions</DropdownMenuLabel>
            <DropdownMenuItem @click="copy(module.module_name)">
                Copy module name
            </DropdownMenuItem>
            <DropdownMenuSeparator />
            <DropdownMenuItem>Edit module</DropdownMenuItem>
            <DropdownMenuItem>Delete module</DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>