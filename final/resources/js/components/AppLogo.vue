<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
</script>

<template>
    <div
        class="flex aspect-square size-8 items-center justify-center rounded-md bg-sidebar-primary text-sidebar-primary-foreground"
    >
        <AppLogoIcon class="  text-white dark:text-black" />
    </div>
    <div class="ml-1 grid flex-1 text-lg text-left ">
        <span class=" truncate leading-tight font-semibold"
            >Schedula</span
        >
    </div>
</template>
