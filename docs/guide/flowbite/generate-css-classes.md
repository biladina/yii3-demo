# Generate `CSS` classes for `Flowbite` components

This guide will help you to generate `CSS` classes for your `HTML` elements.

This demo includes the configuration of [Tailwind CSS](https://tailwindcss.com/) and [Flowbite](https://flowbite.com/).

## Config file `tailwind.config.js`

```js
/** @type {import('tailwindcss').Config} */
module.exports = {
    // List of modules to include.
    content: [
        // View demo files.
        "./resources/**/*.php",
        // Flowbite JS files.
        "./node_modules/flowbite/**/*.js", 
        // Yii Tools awesome component snippet flowbite files.
        "./vendor/yii-tools/awesome-component/snippet/flowbite/button/gradient_monochrome/**/*.php",
        // Yii Tools contact form module views files.
        "./vendor/yii-tools/contact-form/resources/views/**/*.php",
    ],
    theme: {
        extend: {},
    },
    // List of plugins to include.
    plugins: [
        // Flowbite plugin.
        require('flowbite/plugin')
    ],
}
```

## Generate `CSS` classes

```bash
npx tailwindcss -i ./node_modules/tailwindcss/tailwind.css -o ./resources/asset/css/app.css --watch
```

## Generate `CSS` classes and minify

```bash
npx tailwindcss -i ./node_modules/tailwindcss/tailwind.css -o ./resources/asset/css/app.min.css --watch --minify
```
