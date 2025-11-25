<template>
  <canvas ref="chartCanvas"></canvas>
</template>

<script>
import {Chart} from 'chart.js/auto';

export default {
  name: 'DoughnutChart',
  props: {
    data: {type: Object, required: true},
    options: {type: Object, default: () => ({})},
    type: {type: String, default: 'doughnut'},
    showCenterText: {type: Boolean, default: true},
    centerTextFormatter: {
      type: Function, default: (chart) => {
        const meta = chart.getDatasetMeta(0);
        if (!meta || !meta.data || !meta.data.length) return {value: '', description: ''};
        const dataset = chart.data.datasets[0];
        const visibleData = dataset.data.filter((_, i) => chart.getDataVisibility(i));
        const totalVisible = visibleData.reduce((a, b) => a + b, 0);
        const totalAll = dataset.data.reduce((a, b) => a + b, 0);
        const percent = Math.round((totalVisible / totalAll) * 100) + '%';
        return {
          value: totalVisible.toLocaleString(),
          description: percent
        };
      },
    }
  },
  data() {
    return {chart: null};
  },
  mounted() {
    this.buildChart();
  },
  beforeUnmount() {
    this.destroyChart();
  },
  watch: {
    data: {
      deep: true, handler() {
        this.rebuildChart();
      }
    },
    options: {
      deep: true, handler() {
        this.rebuildChart();
      }
    },
  },
  methods: {
    destroyChart() {
      if (this.chart) {
        this.chart.destroy();
        this.chart = null;
      }
    },
    buildChart() {
      const ctx = this.$refs.chartCanvas.getContext('2d');
      if (!ctx) return;
      this.destroyChart();
      const finalPlugins = [];
      if (this.showCenterText) {
        finalPlugins.push({
          afterDraw: (chart) => {
            const {ctx} = chart;
            const meta = chart.getDatasetMeta(0);
            if (!meta || !meta.data || !meta.data.length) return;
            const textObj = this.centerTextFormatter(chart);
            const centerX = meta.data[0].x;
            const centerY = meta.data[0].y;
            ctx.save();

            const bodyStyle = getComputedStyle(document.body);
            const fontFamily = bodyStyle.fontFamily;
            let fontWeight = 600;
            let fontSize = '18px';
            ctx.font = `${fontWeight} ${fontSize} ${fontFamily}`;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            // value
            ctx.fillText(textObj.value, centerX, centerY - 10);

            // description
            fontWeight = bodyStyle.fontWeight;
            fontSize = bodyStyle.fontSize;
            ctx.font = `${fontWeight} ${fontSize} ${fontFamily}`;
            ctx.fillText(textObj.description, centerX, centerY + 20);

            ctx.restore();
          }
        });
      }

      const defaultOptions = {
        radius: '90%',
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
        },
      };

      const cursorPlugin = {
        id: 'legendCursor',
        afterEvent: (chart, args) => {
          const {event} = args;
          if (!chart.legend) return;
          const point = chart.legend.legendHitBoxes.find(box =>
              event.x >= box.left && event.x <= box.left + box.width &&
              event.y >= box.top && event.y <= box.top + box.height
          );
          event.native.target.style.cursor = point ? 'pointer' : 'default';
        }
      };

      const chartData = JSON.parse(JSON.stringify(this.data));
      chartData.datasets.forEach(ds => {
        if (!ds.cutout) {
          ds.cutout = '70%';
        }
      });

      this.chart = new Chart(ctx, {
        type: this.type,
        data: chartData,
        options: {...defaultOptions, ...this.options},
        plugins: [...finalPlugins, cursorPlugin],
      });
    },
    rebuildChart() {
      this.destroyChart();
      this.$nextTick(() => this.buildChart());
    },
  }
};
</script>
