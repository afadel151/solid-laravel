<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import teachers from '@/routes/teachers';
import TeachersTable from '@/components/teachers/TeachersTable.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Teachers',
        href: teachers.index.url(),
    },
];
const props = defineProps({
    teachers:{
        type: Object,
        required:true
    }
})
</script>

<template>
    <Head title="Teachers" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-10 px-10 w-full">
        <TeachersTable :teachers="props.teachers.data" />
        <!-- {{ props.teachers.data }} -->
    </div>
    </AppLayout>
</template>