import {defineConfig} from 'vite'
import vue from '@vitejs/plugin-vue'
import path from "path";

export default defineConfig({
    plugins: [vue()],
    root: 'frontend',
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    build: {
        outDir: "../public/",
        emptyOutDir: false,
        manifest: true,
        rollupOptions: {
            input: path.resolve(__dirname, 'frontend/main.ts'),
        },
    },
})
