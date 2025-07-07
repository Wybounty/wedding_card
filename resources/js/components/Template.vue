<script setup>

const props = defineProps({
    template: Object,
});

</script>

<template>
    <div class="bg-white rounded-lg p-4 w-full h-full">
        <h1>{{ template.name }}</h1>
    </div>
</template>