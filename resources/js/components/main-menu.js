import tailwindTheme from '../tailwindTheme';

export default function() {
    return {

        init() {
            this.setBreakpoint();
            this.update();
        },

        breakpoint: null,

        isDesktop: window.matchMedia('(min-width: '+this.breakpoint+')').matches,

        isOpen: false,

        //showToggle: window.matchMedia('(max-width: '+this.breakpoint+')').matches,

        update() {
            this.isDesktop = window.matchMedia('(min-width: '+this.breakpoint+')').matches;
            //this.showToggle = !this.isDesktop;
        },

        setBreakpoint() {
            const bp = this.$el.dataset.breakpoint;
            this.breakpoint = tailwindTheme.screens[bp] ?? bp;
        },

    }
}
