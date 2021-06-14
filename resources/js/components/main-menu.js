
window.mainMenu = function() {
    return {
        breakpoint: null,
        expanded: window.matchMedia('(min-width: '+this.breakpoint+')').matches,
        showToggle: window.matchMedia('(max-width: '+this.breakpoint+')').matches,
        update() {
            this.expanded = window.matchMedia('(min-width: '+this.breakpoint+')').matches;
            this.showToggle = !this.expanded,
        },
        setBreakpoint() {
            const bp = this.$el.dataset.breakpoint;
            const bpVal = tailwindTheme.screens[bp] ?? bp;
            this.breakpoint = bpVal;
        },
    }
}


