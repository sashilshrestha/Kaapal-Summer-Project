module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [require('daisyui')],
    daisyui: {
        themes: [
            {
                'kaapal-dark': {
                    primary: '#e73e42',
                    'primary-focus': '#d24345',
                    'primary-content': '#ffffff',
                    secondary: '#f000b8',
                    'secondary-focus': '#bd0091',
                    'secondary-content': '#ffffff',
                    accent: '#37cdbe',
                    'accent-focus': '#2aa79b',
                    'accent-content': '#ffffff',
                    neutral: '#3d4451',
                    'neutral-focus': '#2a2e37',
                    'neutral-content': '#ffffff',
                    'base-100': '#212121',
                    'base-200': '#1b1d1d',
                    'base-300': '#131616',
                    'base-content': '#ffffff',
                    info: '#2094f3',
                    success: '#009485',
                    warning: '#ff9900',
                    error: '#ff5724',
                },
            },
        ],
    },
};
