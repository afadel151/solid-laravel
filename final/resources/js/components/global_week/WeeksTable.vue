<script setup lang="ts">
import weeks from '@/routes/weeks';
import Button from '../ui/button/Button.vue';
import { Link } from '@inertiajs/vue3';

import { Edit, Eye } from 'lucide-vue-next';



const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    })
}
import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
    AlertDialogTrigger,
} from '@/components/ui/alert-dialog'
import { computed } from 'vue';

const props = defineProps({
    global_weeks: {
        type: Object,
        required: true
    },
    years: {
        type: Object,
        required: true,
    },
});

const sortedYears = computed(() => {
    return [...props.years.data].sort((a, b) => a.year - b.year);
});

const sortedWeeks = computed(() => {
    return [...props.global_weeks.data]
        .sort((a, b) => new Date(a.start_week_date).getTime() - new Date(b.start_week_date).getTime())
        .map(global_week => ({
            ...global_week,
            weeks: [...global_week.weeks].sort((a, b) => {
                const aIndex = sortedYears.value.findIndex(y => y.id === a.year_id);
                const bIndex = sortedYears.value.findIndex(y => y.id === b.year_id);
                return aIndex - bIndex;
            })
        }));
});



</script>

<template>
    

    <!-- Table Layout -->
    <div class="w-full border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <!-- Header -->
        <div class="grid" :style="`grid-template-columns: 160px repeat(${sortedYears.length}, 1fr) 180px;`">
            <div class="bg-slate-100 border-r text-center  p-3 font-semibold text-slate-700 border-b border-slate-200">
                Start Date
            </div>
            <div v-for="year in sortedYears" :key="year.id"
                class="bg-slate-100 border-r p-3 font-semibold text-slate-700 border-b border-slate-200 text-center">
                Academic year {{ year.year }}
            </div>
            <div class="bg-slate-100 p-3 font-semibold text-slate-700 border-b border-slate-200 text-center">
                Actions
            </div>
        </div>

        <!-- Rows -->
        <div v-for="global_week in sortedWeeks" :key="global_week.id"
            class="grid items-stretch border-t border-slate-100 hover:bg-slate-50 transition"
            :style="`grid-template-columns: 160px repeat(${sortedYears.length}, 1fr) 180px;`">

            <!-- Start date -->
            <div class="p-3 text-sm font-medium text-slate-800 flex items-center justify-center">
                {{ formatDate(global_week.start_week_date) }}
            </div>

            <div v-for="week in global_week.weeks" :key="week.id"
                class="p-3 border-l border-slate-100 flex items-center justify-between">
                <div class="flex flex-col text-left">
                    <p class="font-semibold text-slate-900">{{ week.week_type }}</p>
                    <p class="text-sm text-slate-500">Sessions: {{ week.sessions.length }}</p>
                    <p class="text-sm text-slate-500">Semester: {{ week.semester }}</p>
                </div>
                <Link :href="weeks.show(week.id).url">
                <Button size="sm" variant="secondary">
                    <Eye class="mr-1 w-4 h-4" /> Show
                </Button>
                </Link>
            </div>

            <div class="p-3 flex items-center justify-center space-x-2 border-l border-slate-100">
                <Button size="sm" variant="outline" class="flex items-center space-x-1">
                    <Edit class="w-4 h-4" />
                    <span>Edit</span>
                </Button>
                <AlertDialog>
                    <AlertDialogTrigger>

                        <Button size="sm" variant="destructive">
                            Delete
                        </Button>
                    </AlertDialogTrigger>
                    <AlertDialogContent
                        class="z-[100] text-sm border data-[state=open]:animate-contentShow fixed top-[50%] left-[50%] max-h-[85vh] w-[90vw] max-w-[500px] translate-x-[-50%] translate-y-[-50%] rounded-lg bg-white p-[25px] shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none">
                        <AlertDialogHeader>

                            <AlertDialogTitle class="text-mauve12 m-0 text-[17px] font-semibold">
                                Are you absolutely sure?
                            </AlertDialogTitle>
                            <AlertDialogDescription class="text-mauve11 mt-4 mb-5 text-sm leading-normal">
                                This action cannot be undone. This will permanently delete this week and remove your
                                data from the server.
                            </AlertDialogDescription>
                        </AlertDialogHeader>
                        <AlertDialogFooter>
                            <AlertDialogCancel>Cancel</AlertDialogCancel>
                            <AlertDialogAction>Continue</AlertDialogAction>
                        </AlertDialogFooter>
                    </AlertDialogContent>
                </AlertDialog>
            </div>
        </div>
    </div>
</template>
