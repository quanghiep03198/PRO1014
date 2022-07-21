module.exports = {
  mode: "jit",
  // These paths are just examples, customize them to match your project structure
  purge: ["./*.html", "./css/*.{js,jsx,ts,tsx,vue}"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [require("daisyui")],
  // content: ["./node_modules/flowbite/**/*.js"],
  // plugins: [require("flowbite/plugin")],
};
