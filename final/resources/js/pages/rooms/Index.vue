<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import rooms from '@/routes/rooms';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Rooms',
        href: rooms.index.url(),
    },
];

</script>

<template>
    <Head title="Rooms" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>