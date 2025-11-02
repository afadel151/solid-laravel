<script setup lang="ts">
import { MoreHorizontal } from 'lucide-vue-next'
import { Button } from '@/components/ui/button'
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from '@/components/ui/dropdown-menu'
import { Teacher } from './TeachersTable.vue';

defineProps<{
    teacher: Teacher
}>()

function copy(id: string) {
    navigator.clipboard.writeText(id)
}
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button variant="ghost" class="w-8 h-8 p-0">
                <Button variant="secondary">
                <MoreHorizontal/>
                </Button>
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end">
            <DropdownMenuLabel>Actions</DropdownMenuLabel>
            <DropdownMenuItem @click="copy(teacher.teacher_name)">
                Copy teacher name
            </DropdownMenuItem>
            <DropdownMenuSeparator />
            <DropdownMenuItem>Edit teacher</DropdownMenuItem>
            <DropdownMenuItem>Delete teacher</DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>