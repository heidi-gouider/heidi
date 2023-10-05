// pour supprimer les hash lors du build avec yarn sur le nom des fichiers renomés
import { defineConfig } from 'vite';
// import path from 'path';


export default defineConfig({
  build: {
    rollupOptions: {
      output: {
        entryFileNames: `assets/[name].js`,
        chunkFileNames: `assets/[name].js`,
        assetFileNames: `assets/[name].[ext]`
        // entryFileNames: `templates/[name].js`,
        // chunkFileNames: `templates/[name].js`,
        // assetFileNames: `templates/[name].[ext]`

      },
      // external: ['node_modules/bootstrap/dist/css'],
// input: 'main.js'
    }
  }

  // test de solution pour le problème de récupération des icones bs
  // root: path.resolve(__dirname, 'src'),
  // resolve: {
  //   alias: {
  //     '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
  //   },
  // },
});


// export default {
//   build: {
//     assetsInclude: ['/dist/assets/bootstrap-icons.woff'],
//   },
// };
