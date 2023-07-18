// pour supprimer les hash lors du build avec yarn sur le nom des fichiers renomés
import{defineConfig} from 'vite';
export default defineConfig({
    build: {
      rollupOptions: {
        output: {
          entryFileNames: `assets/[name].js`,
          chunkFileNames: `assets/[name].js`,
          assetFileNames: `assets/[name].[ext]`
        }
      }
    }
  })