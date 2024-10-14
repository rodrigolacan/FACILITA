import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['C:/Users/rodrigo.lacan/OneDrive - SEBRAE/PESSOAL/GitHub/Serviços Sebrae 2.0.0/Servicos_Sebrae_testing-/resources/css/Template/main.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
