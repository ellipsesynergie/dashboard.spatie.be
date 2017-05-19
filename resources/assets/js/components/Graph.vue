<template>
    <canvas class="graph"></canvas>
</template>

<script>
import Chart from 'chart.js';

export default {

    props: {
        labels: {
            type: Array,
            required: true,
        },
        values: {
            type: Array,
            required: true,
        },
        lineColor: {
            type: String,
            required: true,
        },
        backgroundColor: {
            type: String,
            required: true,
        },
        displayXLabels: {
            type: Boolean,
            default: false
        },
        displayYLabels: {
            type: Boolean,
            default: false
        },
        maxTicksLimit: {
            type: Number,
            default: 6
        },
        suggestedYMax: {
            type: Number,
            default: 100
        },
        pointRadius: {
            type: Number,
            default: 0
        }
    },

    mounted() {
        this.renderChart();

        this.$watch('labels', this.updateChart);
        this.$watch('values', this.updateChart);
    },

    data() {
        return {
            options: {
                scales: {
                    xAxes: [{
                        display: this.displayXLabels,
                        ticks: {
                            maxTicksLimit: this.maxTicksLimit,
                        },
                    }],
                    yAxes: [{
                        display: this.displayYLabels,
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: this.suggestedYMax,
                        },
                    }],
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        };
    },

    computed: {
        dataset() {
            return {
                data: this.values,
                lineTension: 0.4,
                borderColor: this.lineColor,
                backgroundColor: this.backgroundColor,
                borderWidth: 2,
                pointRadius: this.pointRadius,
            };
        },
    },

    methods: {
        renderChart() {
            this.chart = new Chart(
                this.$el.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: this.labels,
                        datasets: [this.dataset],
                    },
                    options: this.options,
                }
            );
        },

        updateChart() {
            this.chart.data.labels = this.labels;
            this.chart.data.datasets[0] = this.dataset;

            this.chart.update();
        },
    },
};
</script>
