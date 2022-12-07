<template>
    <div class="px-6 py-4">
        <div v-for="(todolist, index) in todolists">
            <list-item :todolist="todolist" @removed="$emit('reloadlist')" />
        </div>
    </div>
</template>

<script>
import listItem from "./listItem.vue"

export default {
    props: ['todolists'],
    components: {
        listItem
    },
}
</script>
