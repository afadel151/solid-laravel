<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import modules from '@/routes/modules';
import ModulesTable from '@/components/modules/ModulesTable.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Modules',
        href: modules.index.url(),
    },
];
const props = defineProps({
    modules:{
        type: Object,
        required:true
    }
})

</script>

<template>
    <Head title="Modules" />
    <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-10 px-20 w-full">
        <ModulesTable :modules="props.modules.data" />
    </div>
    </AppLayout>
</template>