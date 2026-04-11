import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/contacto.css",
                "resources/css/quienes.css",
                "resources/css/venta.css",
                "resources/css/envio.css",
                "resources/css/garantia.css",
                "resources/css/referencias.css",
                "resources/css/privaciadad.css",
                "resources/css/devoluciones.css",
                "resources/css/show.css",
                "resources/css/cachorrosraza.css",

                // 'resources/js/app.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
