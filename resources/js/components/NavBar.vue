<template>
    <aside class="layout-sidebar">
        <div class="topbar">
            <a href="#">Laravel Challenge</a>
        </div>
        <ul>
        </ul>
    </aside>
</template>

<script>
    export default {
        data(){
            return {
                lessons: [],
            }
        },
        mounted(){
            axios.get('api/lessons')
                .then(response => {
                    this.lessons = response.data
                })
        }
    }
</script>
