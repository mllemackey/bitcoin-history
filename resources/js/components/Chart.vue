<template>
    <div>
        <canvas id="chart" width="400" height="400"></canvas>
    </div>
</template>

<script>
import Chartjs from 'chart.js';

export default {
    name: "Chart",
    props: {
        labels: Array,
        dataProp: Array
    },
    methods: {
        renderChart() {
            new Chartjs(document.getElementById('chart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: this.labels,
                    datasets: [{
                        label: '',
                        data: this.dataProp,
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
        this.renderChart();
    }
}
</script>

<style scoped>
    #chart{
        max-width: 500px;
    }
</style>
