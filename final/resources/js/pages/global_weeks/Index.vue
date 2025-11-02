<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import global_weeks from '@/routes/global_weeks';
import WeeksTable from '@/components/global_week/WeeksTable.vue';
import { onMounted, Ref, ref, watch } from 'vue';
import type { DateValue } from "@internationalized/date"
import {
    getLocalTimeZone,
} from "@internationalized/date"
import { cn } from "@/lib/utils"
import { CalendarIcon } from "lucide-vue-next"
import { Calendar } from "@/components/ui/calendar"
import { Popover, PopoverContent, PopoverTrigger } from "@/components/ui/popover"
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'
const week_types = ['Type A', 'Type B', 'Type C'];
const semesters = [1, 2];

import { reactive } from 'vue'
interface WeekForm {
    week_type: string,
    week_semester: number
}
interface NewGlobalWeekForm {
    new_weeks: Record<number, WeekForm>
    start_week_date: string | null
}
const new_week_form = reactive<NewGlobalWeekForm>({
    new_weeks: {},
    start_week_date: null
})
const new_date = ref<DateValue>()
const df = new Intl.DateTimeFormat("en-US", { dateStyle: "medium" })
watch(new_date, (val) => {
    if (!val) return
    const jsDate = val.toDate(getLocalTimeZone())
    const day = jsDate.getDay() // Sunday = 0
    if (day !== 0) {
        alert("Please select a Sunday!")
        return
    }
    new_week_form.start_week_date = formatDateValue(val)
})
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/components/ui/dialog"
import Button from '@/components/ui/button/Button.vue';
import { Edit } from 'lucide-vue-next';
import axios from 'axios';

function formatDateValue(dateValue: any) {
    if (!dateValue) return null
    const jsDate = dateValue.toDate(getLocalTimeZone())
    const pad = (n: number) => n.toString().padStart(2, "0")
    return `${jsDate.getFullYear()}-${pad(jsDate.getMonth() + 1)}-${pad(jsDate.getDate())} ${pad(jsDate.getHours())}:${pad(jsDate.getMinutes())}:${pad(jsDate.getSeconds())}`
}
onMounted(() => {
    props.years.data.forEach((year: any) => {
        if (!new_week_form.new_weeks[year.id]) {
            new_week_form.new_weeks[year.id] = {
                week_type: '',
                week_semester: 1
            }
        }
    })
})
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

const saveGlobalWeek = () => {
    axios.post('/api/global_weeks/create',
        new_week_form
    ).then((response) => {
        alert(response.data)
    })
}
</script>

<template>

    <Head title="Global weeks" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-5 w-full">
            <div class="w-full flex items-center justify-between mb-8 mt-5">
                <p class="text-3xl font-bold text-slate-800">
                    Total : {{ props.global_weeks.meta.total_global_weeks }} weeks
                </p>
                <Dialog>
                    <DialogTrigger as-child>
                        <Button>
                            <Edit class=" w-4 h-4" />
                            New Global Week
                        </Button>
                    </DialogTrigger>
                    <DialogContent class="w-fit">
                        <DialogHeader>
                            <DialogTitle>Create Global Week</DialogTitle>
                            <DialogDescription>
                                Add a new global week entry.
                            </DialogDescription>
                        </DialogHeader>
                        <div class="flex justify-between items-center">
                            <Label>
                                Select week date
                            </Label>
                            <Popover>
                                <PopoverTrigger as-child>
                                    <Button variant="outline" :class="cn(
                                        'w-[280px] justify-start text-left font-normal',
                                        !new_week_form.start_week_date && 'text-muted-foreground',
                                    )">
                                        <CalendarIcon class="mr-2 h-4 w-4" />
                                        {{
                                            new_week_form.start_week_date
                                                ? df.format(new Date(new_week_form.start_week_date))
                                                : "Pick a Sunday"
                                        }}
                                    </Button>
                                </PopoverTrigger>

                                <PopoverContent class="w-auto p-0">
                                    <Calendar v-model="new_date" initial-focus />
                                </PopoverContent>
                            </Popover>
                        </div>
                        <div class="grid grid-rows-1 gap-2 " :class="`grid-cols-${props.years.meta.total}`">
                            <div v-for="year in props.years.data" class="flex flex-col items-center gap-4">
                                <p class="text-right">
                                    Year {{ year.year }}
                                </p>
                                <Select v-model="new_week_form.new_weeks[year.id].week_type">
                                    <SelectTrigger class="w-[160px]">
                                        <SelectValue placeholder="Select type" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectGroup>
                                            <SelectLabel>Types</SelectLabel>
                                            <SelectItem v-for="type in week_types" :key="type" :value="type">
                                                {{ type }}
                                            </SelectItem>
                                        </SelectGroup>
                                    </SelectContent>
                                </Select>
                                <Select v-model="new_week_form.new_weeks[year.id].week_semester">
                                    <SelectTrigger class="w-[160px]">
                                        <SelectValue placeholder="Select Semester" />
                                    </SelectTrigger>

                                    <SelectContent>
                                        <SelectGroup>
                                            <SelectLabel>Types</SelectLabel>
                                            <SelectItem v-for="semester in semesters" :key="semester" :value="semester">
                                                {{ semester }}
                                            </SelectItem>
                                        </SelectGroup>
                                    </SelectContent>
                                </Select>
                            </div>
                        </div>
                        <DialogFooter>
                            <Button :onclick="saveGlobalWeek">Save</Button>
                        </DialogFooter>
                    </DialogContent>
                </Dialog>
            </div>
            <WeeksTable class="w-full" :global_weeks="props.global_weeks" :years="props.years" />
        </div>
    </AppLayout>
</template>
