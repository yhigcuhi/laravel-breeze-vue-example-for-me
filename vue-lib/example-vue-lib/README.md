# create by ...
docker-compose run lib yarn create vite

# env
viteの envの取り扱いについて
- import.meta.env.VITE_XXX で .env または .env.localの VITE_XXXを vue上で読み込める (run devでも)
- buildしても使えるようになる 接頭辞に ただし、VITE_をつけること
- vite.config.js上は nodejsの範囲の話なので import.meta.env.VITE_XXX では読み込めない process.envでやる
- run devを "dev:staging": "vite --mode staging --host",のように --mode指定で for stagingできる(buildも同様)

[環境ごとなどのenv fileの切り分け](https://ja.vitejs.dev/guide/env-and-mode.html#env-files)
# Vue 3 + Vite

This template should help get you started developing with Vue 3 in Vite. The template uses Vue 3 `<script setup>` SFCs, check out the [script setup docs](https://v3.vuejs.org/api/sfc-script-setup.html#sfc-script-setup) to learn more.

## Recommended IDE Setup

- [VS Code](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur) + [TypeScript Vue Plugin (Volar)](https://marketplace.visualstudio.com/items?itemName=Vue.vscode-typescript-vue-plugin).
