<script setup lang="ts">
import weeks from '@/routes/weeks';
import { Link } from 'lucide-vue-next';
import Button from '../ui/button/Button.vue';


const props = defineProps({
    global_weeks: {
        type: Array<any>,
        required: true
    },
    years: {
        type: Object,
        required: true,
    },
})

</script>

<template>
    <table class="text-center space-y-1 rounded-xl shadow">
        <tr>
            <th v-for="year in props.years.data" class="py-4 border-b">
                year {{ year.year }}
            </th>
        </tr>
        <tr v-for="global_week in props.global_weeks">
            <td v-for="week in global_week.weeks" class=" rounded-xl shadow">
                <Link :href="weeks.show(week.id).url"><Button>Go</Button></Link>
            </td>
        </tr>
    </table>
</template>