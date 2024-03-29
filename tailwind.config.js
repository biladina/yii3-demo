/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.php",
        "./node_modules/flowbite/**/*.js",
        "./vendor/yii-tools/awesome-component/snippet/flowbite/button/gradient_monochrome/**/*.php",
        "./vendor/yii-tools/awesome-component/snippet/flowbite/alert/dismissing/**/*.php",
        "./vendor/yii-tools/awesome-component/snippet/flowbite/navbar/default-navbar.php",
        "./vendor/yii-tools/awesome-component/snippet/flowbite/navbar/menu/default-navbar.php",
        "./vendor/yii-tools/user/resources/views/auth/**/*.php",
        "./vendor/yii-tools/contact-form/resources/views/**/*.php",
    ],
    darkMode: "class",
    safelist: [
        'w-64',
        'w-1/2',
        'rounded-l-lg',
        'rounded-r-lg',
        'bg-gray-200',
        'grid-cols-4',
        'grid-cols-7',
        'h-6',
        'leading-6',
        'h-9',
        'leading-9',
        'shadow-lg',
        'bg-opacity-50',
        'dark:bg-opacity-80'
    ],
    theme: {
        extend: {
            colors: {
                primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a" }
            },
            fontFamily: {
                'sans': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
                'body': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
                'mono': ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', 'Liberation Mono', 'Courier New', 'monospace']
            },
            transitionProperty: {
                'width': 'width'
            },
            textDecoration: ['active'],
            minWidth: {
                'kanban': '28rem'
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
