<template>
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 ">
        <div class="w-full px-6  sm:max-w-md  sm:justify-start">
            <slot name="logo"/>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-2  overflow-hidden sm:rounded-lg">
            <slot/>
        </div>
    </div>
</template>
<script setup>
</script>
