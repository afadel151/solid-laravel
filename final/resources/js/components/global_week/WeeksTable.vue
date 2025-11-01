<script setup lang="ts">
import weeks from '@/routes/weeks';

import Button from '../ui/button/Button.vue';
import { Link } from '@inertiajs/vue3';
import { Card, CardContent } from '@/components/ui/card';
import { computed } from 'vue';

const props = defineProps({
    global_weeks: {
        type: Array<any>,
        required: true
    },
    years: {
        type: Object,
        required: true,
    },
});

const sortedWeeks = computed(() => {
    return [...props.global_weeks]
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
const sortedYears = computed(() => {
    return [...props.years.data].sort((a, b) => a.year - b.year);
});
const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    })
}
</script>

<template>
    <div class="w-full space-y-3 text-center">
        <div class="w-full flex space-x-4 items-center  justify-between">
            <div class="w-96">
                 Start Date
            </div>
            <div v-for="year in props.years.data" class="text-3xl w-full text-center">
                Year {{ year.year }}
            </div>
        </div>
        <div v-for="global_week in sortedWeeks" :key="global_week.id"
            class="w-full flex items-center space-x-4  justify-between">
            <div class=" h-full  w-96  text-center">
                <p class="text-base font-semibold text-foreground">
                    {{ formatDate(global_week.start_week_date) }}
                </p>
            </div>
            <Link v-for="week in global_week.weeks" :key="week.id" :href="weeks.show(week.id).url"
                class="hover:shadow-md  flex justify-between items-center rounded-xl border-slate-200 border p-2  w-full text-center transition-shadow">
                
                <div class="flex flex-col items-start ml-1">
                    <p class="font-bold text-lg">
                        {{ week.week_type }}
                    </p>
                    <p>
                        15 sessions 
                    </p>
                </div>
                <div > 
                    Absent
                </div>
            </Link>
        </div>
    </div>
</template>