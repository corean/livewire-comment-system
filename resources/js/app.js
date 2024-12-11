import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm.js';

console.log(Livewire, Alpine);

import humanDate from './directives/humanDate.js';

Alpine.directive('human-date', humanDate);

Livewire.start();