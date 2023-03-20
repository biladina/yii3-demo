/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.php",
        "./node_modules/flowbite/**/*.js",
        "./vendor/yii-tools/awesome-component/snippet/flowbite/button/gradient_monochrome/**/*.php",
        "./vendor/yii-tools/awesome-component/snippet/flowbite/alert/dismissing/**/*.php",
        "./vendor/yii-tools/awesome-component/snippet/flowbite/navbar/default-navbar.php",
        "./vendor/yii-tools/awesome-component/snippet/flowbite/navbar/menu/default-navbar.php",
        "./vendor/yii-tools/contact-form/resources/views/**/*.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
