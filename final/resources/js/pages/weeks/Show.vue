<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import weeks from '@/routes/weeks';
const props = defineProps({
    week:{
        type: Object,
        required: true
    }
})
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Weeks',
        href: weeks.show(props.week.data.id).url,
    },
];

</script>

<template>
    <Head title="Week" />
    <AppLayout :breadcrumbs="breadcrumbs">
        {{ props.week }}
    </AppLayout>
</template>