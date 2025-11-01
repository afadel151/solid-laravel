<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import sectors from '@/routes/sectors';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Sectors',
        href: sectors.index.url(),
    },
];

</script>

<template>
    <Head title="Sectors" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>