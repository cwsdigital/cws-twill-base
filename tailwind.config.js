module.exports = {
  purge: [
     './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',

   ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    primitives: {
        spacing: (theme) => {
            return theme('utopia.spacingScale')
        },
    },
    switcherPrimitive: {
        thresholds: {
            'md': '40rem',
        },
        limits: [
            2,
            3,
            4,
        ],
    },
    asidePrimitive: {
        asideWidths: {
            '16': '4rem',
            '40': '10rem',
            '96': '24rem',
        },
        minWidths: {
            '2/3': '66%',
            '3/4': '75%',
        },
    },
    extend: {
      screens: {
        'xs': '320px',
      },
      'utopia': theme => ({
        minScreen: theme('screens.xs'),
        minSize: 20,
        maxScreen: theme('screens.xl'),
        maxSize: 24,
        maxScale: 1.25,
        textSizes: [
          '2xs',
          'xs',
          'sm',
          'base',
          'lg',
          'xl',
          '2xl',
          '3xl',
          '4xl',
          '5xl',
        ],
        spacingSizes: {
          'none': 0,
          '2xs': 0.25,
          'xs': 0.5,
          'sm': 0.75,
          'md': 1,
          'lg': 1.5,
          'xl': 2,
          '2xl': 3,
          '3xl': 4,
          '4xl': 6,
        },
        spacingCustomPairs: [
          { sm: 'lg' },
        ],
      }),
      typography:(theme) => ({
        DEFAULT: {
          css: {
              fontSize: 'var(--text-size-base)',
              h1: {
                fontSize: 'var(--text-size-3xl)',
              },
              h2: {
                fontSize: 'var(--text-size-2xl)',
              },
              h3: {
                fontSize: 'var(--text-size-xl)',
              },
              h4: {
                fontSize: 'var(--text-size-lg)',
              },
          },
        }
      }),
    },
  },
  variants: {},
  plugins: [
    require('tailwind-utopia')({
         useClamp: false,
         prefix: '',
         baseTextSize: 'base',
         generateSpacing: true,
         generateAllSpacingPairs: true,
      }),

      require('tailwind-measure'),
      require('tailwind-primitives'),
      require('@tailwindcss/aspect-ratio'),
      require('@tailwindcss/forms'),
  ],
  corePlugins: {
     fontSize: false,
  }
}
