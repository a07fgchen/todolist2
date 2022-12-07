<template>
    <div class="flex justify-around items-center">
        <input type="text" v-model="todolist.content" />
        <button
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
            @click="addTodo()">新增</button>
    </div>
    <p class="text-center text-red-600">{{ message }}</p>
</template>
<script>
export default {
    emits: ["addTodolist"],
    data: function () {
        return {
            todolist: {
                content: '',
            },
            message: '',
        }
    },
    methods: {
        addTodo() {
            if (this.todolist.content === '') {
                this.message = "輸入值不得為空";
                return;
            }

            axios.post('http://localhost/api/todolist', {
                content: this.todolist.content
            }).then(respose => {
                this.todolist.content = "";
                this.$emit('addTodolist')
            }).catch(error => {
                console.log(error)
            });
        }
    },
}
</script>
