<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import weeks from '@/routes/weeks';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Weeks',
        href: weeks.index.url(),
    },
];

</script>

<template>
    <Head title="Weeks" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>