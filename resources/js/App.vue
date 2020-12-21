<template>
    <div class="contenedor">

        <div id="app">
            <router-view />
        </div>


    </div>

</template>

<script>
import { user } from './app';
export default {
    data() {
        return {

            user_logged:user
        }
    },
    components: {

    },
    mounted() {

    }

}
</script>


<style>
.contenedor{
width: 100%;
}


.body{
    display: flex;
    flex-direction: column;
    height: 100%;
}

.card-body-footer{
    background: #cccbcb;

    width: 100%;
    height: 40;
    bottom: 0;

    text-align: center;

}

@media (min-width: 768px) {

    }
</style>

