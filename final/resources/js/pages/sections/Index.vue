<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import sections from '@/routes/sections';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Sections',
        href: sections.index.url(),
    },
];

</script>

<template>
    <Head title="Sections" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>