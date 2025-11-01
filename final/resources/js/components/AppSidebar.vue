<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { CalendarClock, Earth, Glasses, GraduationCap, LayoutGrid, Milestone, Package, PersonStanding, School, Settings, Users } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import global_weeks from '@/routes/global_weeks';
import weeks from '@/routes/weeks';
import years from '@/routes/years';
import sectors from '@/routes/sectors';
import sections from '@/routes/sections';
import groups from '@/routes/groups';
import rooms from '@/routes/rooms';
import modules from '@/routes/modules';
import teachers from '@/routes/teachers';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Global weeks',
        href:global_weeks.index(),
        icon: Earth
    },{
        title: 'Weeks',
        href: weeks.index(),
        icon: CalendarClock
    },
    {
        title: 'Years',
        href: years.index(),
        icon: Users
    },
    {
        title: 'Sectors',
        href: sectors.index(),
        icon: Milestone
    },
    {
        title: 'Sections',
        href: sections.index(),
        icon: Glasses
    },
    {
        title: 'Groups',
        href: groups.index(),
        icon: PersonStanding
    },
    {
        title: 'Rooms',
        href: rooms.index(),
        icon: School
    },
    {
        title: 'Modules',
        href: modules.index(),
        icon: Package
    },{
        title: 'Teachers',
        href: teachers.index(),
        icon: GraduationCap
    }
];

const footerNavItems: NavItem[] = [
    // {
    //     title: 'Settings',
    //     href: 'https://github.com/laravel/vue-starter-kit',
    //     icon: Settings,
    // },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
