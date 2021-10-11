import Alpine from 'alpinejs'
import mainMenu from './components/main-menu.js'

Alpine.data('mainMenu', mainMenu);

window.Alpine = Alpine;
Alpine.start();
