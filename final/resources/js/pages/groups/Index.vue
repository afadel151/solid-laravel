<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import groups from '@/routes/groups';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Groups',
        href: groups.index.url(),
    },
];

</script>

<template>
    <Head title="Groups" />
    <AppLayout :breadcrumbs="breadcrumbs">

    </AppLayout>
</template>