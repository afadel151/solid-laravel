<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import global_weeks from '@/routes/global_weeks';
import WeeksTable from '@/components/global_week/WeeksTable.vue';

const props = defineProps({
    global_weeks: {
        type: Object,
        required: true,
    },
    years: {
        type: Object,
        required: true,
    },
});

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
        <div class="p-5 w-full">
            <WeeksTable class="w-full" :global_weeks="props.global_weeks.data" :years="props.years" />
        </div>
    </AppLayout>
</template>
