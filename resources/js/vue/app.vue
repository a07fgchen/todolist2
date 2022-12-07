<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto bg-white">
        <div class="px-6 py-4 border-b border-cyan-400">
            <addTodoList @addTodolist="getList()" />
        </div>
        <list-view :todolists="todolists" @reloadlist="getList()" />
    </div>
</template>

<script>
import addTodoList from "./addTodoList.vue"
import listView from "./listView.vue"

export default {
    components: {
        addTodoList,
        listView
    },
    data: function () {
        return {
            todolists: []
        }
    },
    methods: {
        getList() {
            axios.get('http://localhost/api/todolist/')
                .then((response) => {
                    this.todolists = response.data
                }).catch(error => {
                    console.log(error)
                })
        }
    },
    created() {
        this.getList();
    },
}
</script>
