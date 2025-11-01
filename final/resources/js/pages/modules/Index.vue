<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import modules from '@/routes/modules';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Modules',
        href: modules.index.url(),
    },
];

</script>

<template>
    <Head title="Modules" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>