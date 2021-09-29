require('./bootstrap');

import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

window.Chart = Chart;

import Alpine from 'alpinejs';

import intersect from '@alpinejs/intersect';

Alpine.plugin(intersect);

window.Alpine = Alpine;

Alpine.start();

