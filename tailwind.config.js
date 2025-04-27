import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#2E7D32',
                    dark: '#1B5E20',
                    light: '#81C784',
                },
                secondary: {
                    DEFAULT: '#FFA000',
                    dark: '#FF8F00',
                    light: '#FFB74D',
                },
            },
            boxShadow: {
                'custom': '0 4px 6px rgba(0, 0, 0, 0.1)',
            },
            transitionProperty: {
                'height': 'height',
                'spacing': 'margin, padding',
            },
        },
    },

    plugins: [forms],
};
