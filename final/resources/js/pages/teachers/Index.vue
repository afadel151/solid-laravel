<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import teachers from '@/routes/teachers';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Teachers',
        href: teachers.index.url(),
    },
];

</script>

<template>
    <Head title="Teachers" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>