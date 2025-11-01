<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import global_weeks from '@/routes/global_weeks';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Global Weeks',
        href: global_weeks.index.url(),
    },
];

</script>

<template>
    <Head title="Global weeks" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>