<template>
    <div>
        <h1>Bitcoin History</h1>
        <Chart :data-prop="[20, 40, 10]" :labels="['2019-08-27', '2019-08-30', '2019-09-01']"></Chart>
    </div>
</template>

<script>
import Chart from "../components/Chart";
export default {
    name: "App",
    components: {
        Chart
    }
}
</script>

<style scoped>

</style>
