<template>
    <div class="flex justify-around items-center m-3">
        <input type="checkbox" @change="updateCompleted()" v-model="todolist.completed_at">
        <input type="text" v-model="todolist.content" @change="updateTodo()" />
        <button @click="removeTodo()"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
            刪除
        </button>
    </div>
    <p class="text-center text-red-600"> {{ message }} </p>
</template>
sty
<script>
export default {
    props: ['todolist'],
    emits: ["removed"],
    data() {
        return {
            message: ''
        }
    },
    methods: {
        updateCompleted() {
            axios.patch(`http://localhost/api/todolist/${this.todolist.id}`, {
                completed_at: this.todolist.completed_at
            }).catch(error => {
                console.log(error);
            })
        },
        updateTodo() {
            if (this.todolist.content == '') {
                this.message = "輸入值不得為空";
                return;
            }
            axios.patch(`http://localhost/api/todolist/content/${this.todolist.id}`, {
                content: this.todolist.content
            }).catch(error => {
                console.log(error);
            })
        },
        removeTodo() {
            axios.delete('http://localhost/api/todolist/' + this.todolist.id)
                .then(response => {
                    this.$emit('removed')
                }).catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>
