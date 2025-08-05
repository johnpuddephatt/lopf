const gutenberg = require('tailwindcss-gutenberg');

module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './safelist.txt',
      './app/**/*.php',
      './resources/**/*.php',
      './resources/**/*.vue',
      './resources/**/*.js',
    ],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ['LOPF-Sans', 'Helvetica', 'Arial', 'sans-serif'],
      serif: ['LOPF-Serif', 'Times', 'Times New Roman'],
    },

    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem',
        xl: '2.5rem',
        '2xl': '3rem',
      },
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      white: '#ffffff',
      black: '#2d2d2d',
      blue: {
        DEFAULT: '#17276c',
        light: '#465389', //was '#5c6897',
        lightest: '#b9bfd1',
      },
      purple: {
        DEFAULT: '#44279a',
        light: '#7b66b7',
        lightest: '#c4bcdf',
      },
      orange: {
        DEFAULT: '#f09436',
        light: '#f3b25f',
        lightest: '#f9deb8',
      },
      pink: {
        DEFAULT: '#d97de7',
        light: '#e3a3ed',
        lightest: '#f2d7f7',
      },
      sky: {
        DEFAULT: '#e1f3e9',
        light: '#ebf7ef',
        lightest: '#f5fbf8',
      },
      green: {
        DEFAULT: '#008d2d',
        light: '#5a9a7b',
        lightest: '#cde9d6',
      },
      gray: {
        50: '#F9FAFB',
        100: '#F3F4F6',
        200: '#E5E7EB',
        300: '#D1D5DB',
        400: '#9CA3AF',
        500: '#6B7280',
        600: '#4B5563',
        700: '#374151',
        800: '#1F2937',
        900: '#111827',
      },
    },
    backgroundSize: {
      auto: 'auto',
      cover: 'cover',
      contain: 'contain',
      '1/2': '50% auto',
    },
    extend: {
      borderRadius: {
        big: '6em',
        giant: '12em',
      },
      minHeight: {
        header: '36em',
        'header-sm': '24em',
      },
      borderWidth: {
        10: '10px',
        12: '12px',
        14: '14px',
      },
      lineHeight: {
        none: '1.1',
      },
      backgroundImage: () => ({}),
      typography: (theme) => ({
        DEFAULT: {
          css: {
            a: {
              color: theme('colors.blue.DEFAULT'),
              textDecorationColor: theme('colors.blue.lightest'),
              textDecorationThickness: '3px',
            },
            hr: {
              borderTopColor: null,
            },
            h2: {
              color: theme('colors.blue.DEFAULT'),
            },
          },
        },
        lg: {
          css: {
            h2: {},
          },
        },
      }),
    },
    gutenberg: (theme) => ({
      // Create block color palette utility classes that WordPress uses.
      // @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
      colors: {
        blue: theme('colors.blue.DEFAULT'),
        sky: theme('colors.sky.DEFAULT'),
      },

      // // If set, will pick the color with most contrast as the foreground text
      // // color for block background color components.
      foregroundColors: [theme('colors.black'), theme('colors.white')],

      // Create block font size utility classes that WordPress uses.
      // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
      fontSizes: {
        xs: theme('fontSize.xs'),
        sm: theme('fontSize.sm'),
        base: theme('fontSize.base'),
        xl: theme('fontSize.xl'),
        xxl: theme('fontSize.2xl'),
      },

      alignments: {
        // Scrollbar width which defaults to macOS 0px but requires overflow-x
        // hidden on <html>. If that's a dealbreaker set it to 15px and some
        // users might have a small gutter.
        scrollbarWidth: '15px',
        // Content areas default width without alignments required when using
        // `sizer` property.
        contentWidth: '672px',
        // A max width cap for alignfull and alignwide
        maxWidth: null,
        // Enable with a truthy value
        alignfull: true,
        // Core Group blocks default to 30px side padding.
        backgroundGutter: '30px',
        // Or override the above configurations per alignment type.
        alignwide: {
          // Add a minimum gutter on the left and right of the alignment
          gutter: theme('spacing.1'),
          // Add a sizing factor to fluidly grow the alignment.
          // Use values between 1.0 and 1.99 where lower means tighter to
          // viewport edge and larger means further.
          // NOTE the values of maxWidth, contentWidth and gutter all have
          // to use the same units for this to work. calc() in media queries
          // does not have good browser support
          sizer: 1.25,
        },
        // Add responsive alignleft and alignright support.
        alignleftright: {
          // Screen size when alignment is triggered, defaults to an arbitrary 640px
          minWidth: theme('screens.sm'),
          // Side margin, defaults to core's 1em.
          margin: theme('spacing.2'),
        },
      },
    }),
  },
  variants: {
    extend: {
      display: ['group-hover'],
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    gutenberg.colors,
    gutenberg.fontSizes,
    gutenberg.foregroundColors,
    gutenberg.alignments,
    gutenberg.admin,
  ],
};
