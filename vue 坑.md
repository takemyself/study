# vue 相关问题
### 页面跳转置顶
```
export default new Router({
  node: 'history',
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    }
  ]
})
```

### vue 页面刷新404
```
 location / {
    try_files $uri $uri/ @router;
    index index.html;
}
location @router {
    rewrite ^.*$ /index.html last;
}
```

### IE9页面空白问题
```
index.html 加入
<meta http-equiv="X-UA-Compatible" content="IE=edge">
```

## vue打包
#### vue打包加版本号
+ webpack .prod.conf.js
```
const  Version = new Date().getTime(); // 这里使用的是时间戳来区分 ，也可以自己定义成别的如：1.1 
output: {
    path:config.build.assetsRoot,
    filename:utils.assetsPath('js/[name].[chunkhash]' + Version + '.js'),
    chunkFilename:utils.assetsPath('js/[id].[chunkhash] ' + Version + '.js')
},
new ExtractTextPlugin({
    filename: utils.assetsPath('css/[name].[contenthash]' + Version + '.css'),
    allChunks: true,
}),
```

#### vue压缩打包
+ 版本问题，如果是webpack4.0没问题，一般都是3.X，那就改变版本咯，1.1.12

---

```
compression-webpack-plugin
```

### vue压缩打包服务器配置

```
gzip on;
gzip_static on;
gzip_min_length 1k;
gzip_buffers 16 64k;
gzip_http_version 1.1;
gzip_comp_level 9;
gzip_types text/plain application/x-javascript text/css application/xml text/javascript application/x-httpd-php image/jpeg image/gif image/png;
gzip_vary on;
```
