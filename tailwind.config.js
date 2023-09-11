/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.css",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        container: {
            center: true,
            padding: "11.5rem",
            screens: {
                "2xl": "1440px",
            },
        },
        extend: {
            colors: {
                primary: {
                    10: "#CCC8FF",
                    20: "#4D3EFF",
                    30: "#492BEF",
                    40: "#3A1ED5",
                    50: "#3019B2",
                    60: "#27148E",
                    70: "#1C115A",
                },
                secondary: {
                    10: "#F9FFE8",
                    20: "#EBFFAA",
                    30: "#E1FF80",
                    40: "#C2FE00",
                    50: "#A2D400",
                    60: "#617F00",
                    70: "#273300",
                },
                neutral: {
                    10: "#FFFFFF",
                    20: "#E6E7F3",
                    30: "#AFBAC3",
                    40: "#8897A5",
                    50: "#607487",
                    60: "#385269",
                    70: "#102F4B",
                },
            },
            // Noiu color palettes

            keyframes: {
                "accordion-down": {
                    from: { height: 0 },
                    to: { height: "var(--radix-accordion-content-height)" },
                },
                "accordion-up": {
                    from: { height: "var(--radix-accordion-content-height)" },
                    to: { height: 0 },
                },
            },
            animation: {
                "accordion-down": "accordion-down 0.2s ease-out",
                "accordion-up": "accordion-up 0.2s ease-out",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
