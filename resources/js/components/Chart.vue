<template>
    <div>
        <div class="form">
            <input type="date" id="start" name="start"
                   v-model="startDate">
            <input type="date" id="end" name="end"
                   v-model="endDate">
            <button @click="getPrice(startDate, endDate)">Render</button>
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
        },
        getPrice(start, end) {
            let d, l
            let self = this;
            axios.post('/bitcoin-price', {
                start: start,
                end: end
            })
                .then(function (response) {
                    l = Object.keys(response.data).map(key => key)
                    d = Object.keys(response.data).map(key => response.data[key])
                    self.renderChart(l, d)
                })
        }
    },
    mounted() {
        this.getPrice(this.startDate, this.endDate)
    }
}
</script>

<style scoped>

</style>
