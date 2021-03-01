<template>
    <div>
        <div class="form">
            <input type="date" id="start" name="trip-start"
                   :value="startDate">
            <input type="date" id="end" name="trip-end"
                   :value="endDate">
            <button @click="renderChart( ['2019-08-27', '2019-08-30', '2019-09-01'], [20, 40, 10])">Render</button>
        </div>
        <canvas id="chart"></canvas>
    </div>
</template>

<script>
import Chartjs from 'chart.js';

export default {
    name: "Chart",
    data() {
        return {
            endDate: new Date().toISOString().slice(0, 10),
            startDate: new Date(new Date().setDate(new Date().getDate() - 10)).toISOString().slice(0, 10)
        }
    },
    methods: {
        renderChart(labels, data) {
            new Chartjs(document.getElementById('chart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '',
                        data: data,
                        lineTension: 0,
                        fill: false,
                        borderColor: 'rgb(27, 50, 128)',
                        steppedLine: false,
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }],
                    }
                }
            });
        }
    },
    mounted() {
        this.renderChart(['2019-08-27', '2019-08-30', '2019-09-01'], [20, 40, 10]);
    }
}
</script>

<style scoped>

</style>
