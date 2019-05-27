# vue 下载model
### 兼容IE9
```
npm install --save babel-polyfill

import "babel-polyfill";

在 webpack.config.js 中，将 babel-polyfill 加到你的 entry 数组中：

module.exports = {
  entry: ["babel-polyfill", "./app/js"]
};
```
### 移动端300毫秒延迟

```
npm install fastclick -S

import fastClick from 'fastclick'

if ('addEventListener' in document) {
  document.addEventListener('DOMContentLoaded', function () {
    fastClick.attach(document.body)
  }, false)
}
```


### axios
[文档链接](https://www.kancloud.cn/yunye/axios/234845)https://www.kancloud.cn/yunye/axios/234845
```
npm install axios -S
```
### js-cookie
[文档链接](https://www.npmjs.com/package/js-cookie)https://www.npmjs.com/package/js-cookie

```
npm i js-cookie
```
### element-ui
[文档地址](http://element-cn.eleme.io/#/zh-CN/component/quickstart)http://element-cn.eleme.io/#/zh-CN/component/quickstart
```
npm i element-ui -S

main.js中引入

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);
```
### 轮播图插件

```
npm install vue-awesome-swiper --sav

import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'

Vue.use(VueAwesomeSwiper)

<template>
 <swiper :options="swiperOption" ref="mySwiper">
    <!-- slides -->
    <swiper-slide>I'm Slide 1</swiper-slide>
    <swiper-slide>I'm Slide 2</swiper-slide>
    <swiper-slide>I'm Slide 3</swiper-slide>
    <swiper-slide>I'm Slide 4</swiper-slide>
    <swiper-slide>I'm Slide 5</swiper-slide>
    <swiper-slide>I'm Slide 6</swiper-slide>
    <swiper-slide>I'm Slide 7</swiper-slide>
    <!-- Optional controls -->
    <div class="swiper-pagination"  slot="pagination"></div>
    <div class="swiper-button-prev" slot="button-prev"></div>
    <div class="swiper-button-next" slot="button-next"></div>
    <div class="swiper-scrollbar"   slot="scrollbar"></div>
  </swiper>
</template>
<script>
import { swiper, swiperSlide } from 'vue-awesome-swiper'
  export default {
     name: 'carrousel',
    data() {
      return {
        swiperOption: {
          // NotNextTick is a component's own property, and if notNextTick is set to true, the component will not instantiate the swiper through NextTick, which means you can get the swiper object the first time (if you need to use the get swiper object to do what Things, then this property must be true)
          // notNextTick是一个组件自有属性，如果notNextTick设置为true，组件则不会通过NextTick来实例化swiper，也就意味着你可以在第一时间获取到swiper对象，假如你需要刚加载遍使用获取swiper对象来做什么事，那么这个属性一定要是true
          notNextTick: true,
          // swiper configs 所有的配置同swiper官方api配置
          autoplay: 3000,
          // direction : 'vertical',
          effect:"coverflow",
          grabCursor : true,
          setWrapperSize :true,
          // autoHeight: true,
          // paginationType:"bullets",
          pagination : '.swiper-pagination',
          paginationClickable :true,
          prevButton:'.swiper-button-prev',
          nextButton:'.swiper-button-next',
          // scrollbar:'.swiper-scrollbar',
          mousewheelControl : true,
          observeParents:true,
          // if you need use plugins in the swiper, you can config in here like this
          // 如果自行设计了插件，那么插件的一些配置相关参数，也应该出现在这个对象中，如下debugger
          // debugger: true,
          // swiper callbacks
          // swiper的各种回调函数也可以出现在这个对象中，和swiper官方一样
          // onTransitionStart(swiper){
          //   console.log(swiper)
          // },
          // more Swiper configs and callbacks...
          // ...
        }
      }
    },
    components: {
        swiper,
        swiperSlide
    },
    // you can find current swiper instance object like this, while the notNextTick property value must be true
    // 如果你需要得到当前的swiper对象来做一些事情，你可以像下面这样定义一个方法属性来获取当前的swiper对象，同时notNextTick必须为true
    computed: {
      swiper() {
        return this.$refs.mySwiper.swiper
      }
    },
    mounted() {
      // you can use current swiper instance object to do something(swiper methods)
      // 然后你就可以使用当前上下文内的swiper对象去做你想做的事了
      // console.log('this is current swiper instance object', this.swiper)
      // this.swiper.slideTo(3, 1000, false)
    }
  }
</script>
```
### lib-flexible 移动端适配rem
+ 注意：项目重新git clone之后要重新下载，不然会报css-loder错误
```
npm i lib-flexible --save

import 'lib-flexible/flexible'

npm install px2rem-loader

在build文件中找到util.js，将px2rem-loader添加到cssLoaders中

const cssLoader = {
    loader: 'css-loader',
    options: {
      minimize: process.env.NODE_ENV === 'production',
      sourceMap: options.sourceMap
    }
  }
const postcssLoader = {
    loader: 'postcss-loader',
    options: {
       sourceMap: options.sourceMap
    }
}

const px2remLoader = {
    loader: 'px2rem-loader',
    options: {
      remUnit: 75
    }
}

同时，在generateLoaders方法中添加px2remLoader

function generateLoaders (loader, loaderOptions) {
    const loaders = options.usePostCSS ? [cssLoader, postcssLoader, px2remLoader] : [cssLoader, px2remLoader]
    if (loader) {
      　　loaders.push({
        　　loader: loader + '-loader',
        　　options: Object.assign({}, loaderOptions, {
          　　sourceMap: options.sourceMap
        　　})
      　　})
    　　}

    if (options.extract) {
      　　return ExtractTextPlugin.extract({
        　　use: loaders,
        　　fallback: 'vue-style-loader'
      　　})
    　　} else {
      　　return ['vue-style-loader'].concat(loaders)
    　　}
  }
```
### vue-lazyload 图片懒加载
[文档地址](https://www.npmjs.com/package/vue-lazyload)https://www.npmjs.com/package/vue-lazyload

```
npm i vue-lazyload

import VueLazyload from 'vue-lazyload'
 
Vue.use(VueLazyload)
```
### vuex
[文档地址](https://vuex.vuejs.org/zh/installation.html)https://vuex.vuejs.org/zh/installation.html
```
npm install vuex --save
```
### es6-promise

```
npm i es6-promise
```
### qrcode 二维码
[文档地址](https://www.npmjs.com/package/qrcode)https://www.npmjs.com/package/qrcode
```
npm i qrcode
```
### 城市三级联动v-distpicker
[文档地址](https://www.npmjs.com/package/v-distpicker)https://www.npmjs.com/package/v-distpicker
```
npm i v-distpicker
```
### 滑动导航vue-tabbar-slide
[文档地址](https://github.com/Blubiubiu/vue-tabbar-slide)https://github.com/Blubiubiu/vue-tabbar-slide
```
npm install vue-tabbar-slide -S
```
### nprogress 进度条
```
npm install --save nprogress
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'

router.beforeEach((to, from, next) => {
    NProgress.start();
    next()
});

router.afterEach(transition => {
    NProgress.done();
});
```
