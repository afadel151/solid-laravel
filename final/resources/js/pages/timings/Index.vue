<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import timings from '@/routes/timings';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Timings',
        href: timings.index.url(),
    },
];

</script>

<template>
    <Head title="Timings" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>