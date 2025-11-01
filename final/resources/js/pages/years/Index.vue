<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import years from '@/routes/years';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Years',
        href: years.index.url(),
    },
];

</script>

<template>
    <Head title="Years" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>