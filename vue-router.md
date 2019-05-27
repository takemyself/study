# vue 优化
### vue 路由优化

```
_import_development.js //开发模式

module.exports = file => require('@/components/' + file + '.vue').default // vue-loader at least v13.0.0+

_import_production.js //生产模式

module.exports = file => () => import('@/components/' + file + '.vue')

index.js 使用

const _import = require('./_import_' + process.env.NODE_ENV)

component: _import('index/Index')
```
